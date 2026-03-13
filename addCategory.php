<!doctype html>
<html lang="en" class="h-full">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add New Category | WebPOSLk</title>
  <script src="https://cdn.tailwindcss.com/3.4.17"></script>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      font-family: 'IBM Plex Sans', sans-serif;
    }

    body {
      background-color: #f8fafc;
    }
  </style>
</head>

<body class="h-full overflow-hidden flex flex-col">
  <header class="bg-white border-b border-slate-200 px-6 py-4 flex items-center justify-between flex-shrink-0">
    <div class="flex items-center gap-4">
      <a href="viewCategories.php" class="p-2 hover:bg-slate-100 rounded-lg text-slate-400 transition-colors">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
      </a>
      <h1 class="text-xl font-bold text-slate-800">Create New Category</h1>
    </div>
  </header>

  <main class="flex-1 p-8 overflow-y-auto">
    <div class="max-w-xl mx-auto">
  <div class="bg-white border border-slate-200 rounded-3xl p-8 shadow-sm">
    <div class="space-y-6">
      
      <div class="flex items-center gap-4 mb-2">
        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
          </svg>
        </div>
        <div>
          <h3 class="text-sm font-bold text-slate-800">Classification</h3>
          <p class="text-xs text-slate-500">Organize your Quick Mart products into logical groups.</p>
        </div>
      </div>
      <div>
        <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Category Name</label>
        <input type="text" id="category_name" onkeyup="generateSlug(this.value)" placeholder="e.g. Home Appliances" class="w-full px-5 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm outline-none focus:ring-4 focus:ring-blue-500/5 focus:border-blue-500 transition-all">
        
        <div class="flex justify-between items-center mt-2 px-1">
            <p class="text-[11px] text-slate-400 italic">Slug: /category/<span id="slug-preview" class="font-medium text-blue-500">home-appliances</span></p>
            <div id="msg" class="text-xs font-bold text-rose-500"></div>
        </div>
      </div>

      <div class="flex gap-3 pt-4">
        <button onclick="saveCategory();" class="w-full py-3 bg-blue-800 text-white rounded-xl text-sm font-bold hover:bg-blue-900 shadow-lg shadow-blue-800/20 transition-all active:scale-95">Save Category</button>
      </div>
    </div>
  </div>
</div>
  </main>

  <script src="./assets/js/script.js"></script>
</body>

</html>