import { mkdirSync, cpSync, copyFileSync, writeFileSync, readFileSync, existsSync } from 'node:fs';
import { resolve } from 'node:path';

const repoRoot = resolve(import.meta.dirname, '..');
const publicBuild = resolve(repoRoot, 'public', 'build');
const dist = resolve(repoRoot, 'dist');
const distBuild = resolve(dist, 'build');

mkdirSync(dist, { recursive: true });
cpSync(publicBuild, distBuild, { recursive: true });

const favicon = resolve(repoRoot, 'public', 'favicon.ico');
if (existsSync(favicon)) {
  copyFileSync(favicon, resolve(dist, 'favicon.ico'));
}

const manifest = JSON.parse(readFileSync(resolve(distBuild, 'manifest.json'), 'utf8'));
const cssEntry = manifest['resources/css/app.css'];
const jsEntry = manifest['resources/js/app.js'];

const cssLink = cssEntry ? `<link rel="stylesheet" href="/build/${cssEntry.file}">` : '';
const jsScript = jsEntry ? `<script type="module" src="/build/${jsEntry.file}"></script>` : '';

const html = `<!doctype html>
<html lang="en" class="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Expense Tracker</title>
    <link rel="icon" href="/favicon.ico">
    ${cssLink}
  </head>
  <body class="min-h-screen bg-gray-900 text-gray-100">
    <main class="min-h-screen flex items-center justify-center px-6">
      <div class="glass-card max-w-xl text-center">
        <h1 class="gradient-text text-4xl mb-4">Expense Tracker</h1>
        <p class="mb-4">
          This is a Laravel application. The frontend assets have been built and
          published, but the dynamic features require a PHP runtime which Netlify
          static hosting does not provide.
        </p>
        <p class="text-sm opacity-80">
          To run the full application, deploy it to a PHP-capable host
          (for example Render, DigitalOcean App Platform, Laravel Forge, or Laravel Vapor).
        </p>
      </div>
    </main>
    ${jsScript}
  </body>
</html>
`;

writeFileSync(resolve(dist, 'index.html'), html);

console.log('Netlify postbuild: wrote dist/ with built assets and index.html');
