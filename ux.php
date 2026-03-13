<!doctype html>
<html lang="en" class="h-full">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>POS System Dashboard</title>
  <script src="https://cdn.tailwindcss.com/3.4.17"></script>
  <script src="/_sdk/element_sdk.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
  <style>
    * {
      font-family: 'IBM Plex Sans', sans-serif;
    }

    .scrollbar-thin::-webkit-scrollbar {
      width: 6px;
    }

    .scrollbar-thin::-webkit-scrollbar-track {
      background: #f1f5f9;
    }

    .scrollbar-thin::-webkit-scrollbar-thumb {
      background: #cbd5e1;
      border-radius: 3px;
    }

    .scrollbar-thin::-webkit-scrollbar-thumb:hover {
      background: #94a3b8;
    }
  </style>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#1e40af',
            secondary: '#f8fafc',
            accent: '#059669',
            danger: '#dc2626',
            muted: '#64748b'
          }
        }
      }
    }
  </script>
  <style>
    body {
      box-sizing: border-box;
    }
  </style>
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
</head>

<body class="h-full bg-slate-100 overflow-hidden">
  <div id="app" class="h-full flex flex-col">
    <!-- Header -->
    <header class="bg-white border-b border-slate-200 px-4 py-3 flex items-center justify-between flex-shrink-0">
      <div class="flex items-center gap-3">
        <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
          <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewbox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
          </svg>
        </div>
        <div>
          <h1 id="store-name" class="text-lg font-semibold text-slate-800">QuickMart POS</h1>
          <p class="text-xs text-muted">Point of Sale System</p>
        </div>
      </div>
      <div class="flex items-center gap-4">
        <div class="text-right">
          <p class="text-sm font-medium text-slate-700" id="current-date"></p>
          <p class="text-xs text-muted" id="current-time"></p>
        </div>
        <div class="flex items-center gap-2 pl-4 border-l border-slate-200">
          <div class="w-8 h-8 bg-slate-200 rounded-full flex items-center justify-center">
            <svg class="w-4 h-4 text-slate-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
          </div><span class="text-sm font-medium text-slate-700">Admin</span>
        </div>
      </div>
    </header>
    <!-- Main Content -->
    <div class="flex-1 flex overflow-hidden">
      <!-- Sidebar Navigation -->
      <aside class="w-16 bg-white border-r border-slate-200 flex flex-col items-center py-4 gap-2 flex-shrink-0"><button onclick="switchView('pos')" id="nav-pos" class="nav-btn w-12 h-12 rounded-lg flex items-center justify-center bg-primary text-white" title="POS">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
          </svg></button> <button onclick="switchView('products')" id="nav-products" class="nav-btn w-12 h-12 rounded-lg flex items-center justify-center text-slate-500 hover:bg-slate-100" title="Products">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
          </svg></button> <button onclick="switchView('add-product')" id="nav-add-product" class="nav-btn w-12 h-12 rounded-lg flex items-center justify-center text-slate-500 hover:bg-slate-100" title="Add Product">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
          </svg></button> <button onclick="switchView('categories')" id="nav-categories" class="nav-btn w-12 h-12 rounded-lg flex items-center justify-center text-slate-500 hover:bg-slate-100" title="Categories">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
          </svg></button> <button onclick="switchView('add-category')" id="nav-add-category" class="nav-btn w-12 h-12 rounded-lg flex items-center justify-center text-slate-500 hover:bg-slate-100" title="Add Category">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
          </svg></button> <button onclick="switchView('sales')" id="nav-sales" class="nav-btn w-12 h-12 rounded-lg flex items-center justify-center text-slate-500 hover:bg-slate-100" title="Sales History">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
          </svg></button> <button onclick="switchView('reports')" id="nav-reports" class="nav-btn w-12 h-12 rounded-lg flex items-center justify-center text-slate-500 hover:bg-slate-100" title="Reports">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
          </svg></button>
        <div class="flex-1"></div><button onclick="switchView('settings')" id="nav-settings" class="nav-btn w-12 h-12 rounded-lg flex items-center justify-center text-slate-500 hover:bg-slate-100" title="Settings">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewbox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
          </svg></button>
      </aside>
      
      <!-- POS View -->
      <div id="view-pos" class="flex-1 flex overflow-hidden p-4">
        <!-- Products Grid Section -->
        <div class="flex-1 flex flex-col overflow-hidden">
          <!-- Search and Filter Bar -->
          <div class="flex items-center gap-3 mb-4 flex-shrink-0">
            <div class="flex-1 relative">
              <svg class="w-5 h-5 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
              </svg><input type="text" id="search-input" placeholder="Search products or scan barcode..." class="w-full pl-10 pr-4 py-2.5 bg-white border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">
            </div><select id="category-filter" class="px-4 py-2.5 bg-white border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-primary">
              <option value="all">All Categories</option>
            </select>
          </div>
          <!-- Products Grid -->
          <div id="products-grid" class="flex-1 overflow-y-auto scrollbar-thin">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-3"><!-- Products will be inserted here -->
            </div>
          </div>
        </div>
        <!-- Cart Section -->
        <div class="w-96 bg-white border-l border-slate-200 flex flex-col flex-shrink-0 rounded-lg"><!-- Cart Header -->
          <div class="p-4 border-b border-slate-200">
            <div class="flex items-center justify-between">
              <div>
                <h2 class="font-semibold text-slate-800">Current Sale</h2>
                <p class="text-xs text-muted">Bill #<span id="bill-number">INV-001</span></p>
              </div><button onclick="clearCart()" class="text-xs text-danger hover:text-red-700 font-medium">Clear All</button>
            </div>
          </div>
          <!-- Cart Items -->
          <div id="cart-items" class="flex-1 overflow-y-auto scrollbar-thin p-4 space-y-3">
            <div id="empty-cart" class="flex flex-col items-center justify-center h-full text-slate-400">
              <svg class="w-16 h-16 mb-3" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
              </svg>
              <p class="text-sm">Cart is empty</p>
              <p class="text-xs mt-1">Add products to start</p>
            </div>
          </div>
          <!-- Cart Summary -->
          <div class="border-t border-slate-200 p-4 space-y-3 bg-slate-50">
            <div class="space-y-2 text-sm">
              <div class="flex justify-between"><span class="text-muted">Subtotal</span> <span class="font-medium" id="cart-subtotal">$0.00</span>
              </div>
              <div class="flex justify-between"><span class="text-muted">Tax (0%)</span> <span class="font-medium" id="cart-tax">$0.00</span>
              </div>
              <div class="flex justify-between"><span class="text-muted">Discount</span> <span class="font-medium text-accent" id="cart-discount">-$0.00</span>
              </div>
              <div class="flex justify-between pt-2 border-t border-slate-200"><span class="font-semibold text-slate-800">Total</span> <span class="font-bold text-lg text-primary" id="cart-total">$0.00</span>
              </div>
            </div>
            <!-- Payment Section -->
            <div class="space-y-2">
              <div class="flex gap-2"><input type="number" id="paid-amount" placeholder="Amount Paid" class="flex-1 px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-primary"> <select id="payment-method" class="px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-primary">
                  <option value="cash">Cash</option>
                  <option value="card">Card</option>
                  <option value="mobile">Mobile</option>
                </select>
              </div>
              <div class="flex justify-between text-sm"><span class="text-muted">Change</span> <span class="font-medium text-accent" id="change-amount">$0.00</span>
              </div>
            </div>
            <!-- Action Buttons -->
            <div class="grid grid-cols-2 gap-2 pt-2"><button onclick="holdSale()" class="px-4 py-2.5 bg-slate-200 text-slate-700 rounded-lg font-medium text-sm hover:bg-slate-300 transition-colors"> Hold Sale </button> <button onclick="switchView('complete-sale')" id="complete-sale-btn" class="px-4 py-2.5 bg-primary text-white rounded-lg font-medium text-sm hover:bg-blue-700 transition-colors"> Complete Sale </button>
            </div>
          </div>
        </div>
      </div>


      <!-- Products Management View -->
      <div id="view-products" class="flex-1 p-6 overflow-y-auto hidden">
        <div class="max-w-6xl mx-auto">
          <div class="flex items-center justify-between mb-6">
            <div>
              <h2 class="text-xl font-semibold text-slate-800">Products Management</h2>
              <p class="text-sm text-muted">Manage your inventory</p>
            </div><button onclick="switchView('add-product')" class="px-4 py-2 bg-primary text-white rounded-lg font-medium text-sm hover:bg-blue-700 flex items-center gap-2">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
              </svg> Add Product </button>
          </div>
          <div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
            <table class="w-full">
              <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                  <th class="text-left px-4 py-3 text-xs font-semibold text-slate-600 uppercase">Product</th>
                  <th class="text-left px-4 py-3 text-xs font-semibold text-slate-600 uppercase">Barcode</th>
                  <th class="text-left px-4 py-3 text-xs font-semibold text-slate-600 uppercase">Category</th>
                  <th class="text-right px-4 py-3 text-xs font-semibold text-slate-600 uppercase">Cost</th>
                  <th class="text-right px-4 py-3 text-xs font-semibold text-slate-600 uppercase">Price</th>
                  <th class="text-right px-4 py-3 text-xs font-semibold text-slate-600 uppercase">Stock</th>
                  <th class="text-center px-4 py-3 text-xs font-semibold text-slate-600 uppercase">Actions</th>
                </tr>
              </thead>
              <tbody id="products-table-body" class="divide-y divide-slate-100"><!-- Products will be inserted here -->
              </tbody>
            </table>
          </div>
        </div>
      </div><!-- Add Product Page -->
      <div id="view-add-product" class="flex-1 p-6 overflow-y-auto hidden">
        <div class="max-w-2xl mx-auto">
          <div class="flex items-center gap-3 mb-6"><button onclick="switchView('products')" class="p-2 hover:bg-slate-100 rounded-lg">
              <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
              </svg></button>
            <div>
              <h2 class="text-xl font-semibold text-slate-800">Add New Product</h2>
              <p class="text-sm text-muted">Enter product details</p>
            </div>
          </div>
          <div class="bg-white rounded-lg border border-slate-200 p-6 space-y-4">
            <div><label class="block text-sm font-medium text-slate-700 mb-1">Product Name</label> <input type="text" id="product-name" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-primary" placeholder="Enter product name">
            </div>
            <div><label class="block text-sm font-medium text-slate-700 mb-1">Barcode</label> <input type="text" id="product-barcode" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-primary" placeholder="Enter barcode">
            </div>
            <div><label class="block text-sm font-medium text-slate-700 mb-1">Category</label> <select id="product-category" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-primary"></select>
            </div>
            <div class="grid grid-cols-2 gap-4">
              <div><label class="block text-sm font-medium text-slate-700 mb-1">Cost Price</label> <input type="number" id="product-cost" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-primary" placeholder="0.00" step="0.01" min="0">
              </div>
              <div><label class="block text-sm font-medium text-slate-700 mb-1">Selling Price</label> <input type="number" id="product-price" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-primary" placeholder="0.00" step="0.01" min="0">
              </div>
            </div>
            <div><label class="block text-sm font-medium text-slate-700 mb-1">Stock Quantity</label> <input type="number" id="product-stock" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-primary" placeholder="0" min="0">
            </div>
            <div class="flex justify-end gap-2 pt-4"><button onclick="switchView('products')" class="px-4 py-2 text-slate-600 hover:bg-slate-200 rounded-lg font-medium text-sm">Cancel</button> <button onclick="saveProduct()" class="px-4 py-2 bg-primary text-white rounded-lg font-medium text-sm hover:bg-blue-700">Save Product</button>
            </div>
          </div>
        </div>
      </div><!-- Categories View -->
      <div id="view-categories" class="flex-1 p-6 overflow-y-auto hidden">
        <div class="max-w-4xl mx-auto">
          <div class="flex items-center justify-between mb-6">
            <div>
              <h2 class="text-xl font-semibold text-slate-800">Categories</h2>
              <p class="text-sm text-muted">Organize your products</p>
            </div><button onclick="switchView('add-category')" class="px-4 py-2 bg-primary text-white rounded-lg font-medium text-sm hover:bg-blue-700 flex items-center gap-2">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
              </svg> Add Category </button>
          </div>
          <div id="categories-grid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"><!-- Categories will be inserted here -->
          </div>
        </div>
      </div><!-- Add Category Page -->
      <div id="view-add-category" class="flex-1 p-6 overflow-y-auto hidden">
        <div class="max-w-2xl mx-auto">
          <div class="flex items-center gap-3 mb-6"><button onclick="switchView('categories')" class="p-2 hover:bg-slate-100 rounded-lg">
              <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
              </svg></button>
            <div>
              <h2 class="text-xl font-semibold text-slate-800">Add New Category</h2>
              <p class="text-sm text-muted">Create a new product category</p>
            </div>
          </div>
          <div class="bg-white rounded-lg border border-slate-200 p-6 space-y-4">
            <div><label class="block text-sm font-medium text-slate-700 mb-1">Category Name</label> <input type="text" id="category-name" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-primary" placeholder="Enter category name">
            </div>
            <div class="flex justify-end gap-2 pt-4"><button onclick="switchView('categories')" class="px-4 py-2 text-slate-600 hover:bg-slate-200 rounded-lg font-medium text-sm">Cancel</button> <button onclick="saveCategory()" class="px-4 py-2 bg-primary text-white rounded-lg font-medium text-sm hover:bg-blue-700">Save Category</button>
            </div>
          </div>
        </div>
      </div><!-- Sales History View -->
      <div id="view-sales" class="flex-1 p-6 overflow-y-auto hidden">
        <div class="max-w-6xl mx-auto">
          <div class="flex items-center justify-between mb-6">
            <div>
              <h2 class="text-xl font-semibold text-slate-800">Sales History</h2>
              <p class="text-sm text-muted">View past transactions</p>
            </div>
            <div class="flex items-center gap-3"><input type="date" id="sales-date-filter" class="px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-primary">
            </div>
          </div>
          <div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
            <table class="w-full">
              <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                  <th class="text-left px-4 py-3 text-xs font-semibold text-slate-600 uppercase">Bill #</th>
                  <th class="text-left px-4 py-3 text-xs font-semibold text-slate-600 uppercase">Date</th>
                  <th class="text-right px-4 py-3 text-xs font-semibold text-slate-600 uppercase">Items</th>
                  <th class="text-right px-4 py-3 text-xs font-semibold text-slate-600 uppercase">Total</th>
                  <th class="text-right px-4 py-3 text-xs font-semibold text-slate-600 uppercase">Profit</th>
                  <th class="text-left px-4 py-3 text-xs font-semibold text-slate-600 uppercase">Payment</th>
                  <th class="text-center px-4 py-3 text-xs font-semibold text-slate-600 uppercase">Actions</th>
                </tr>
              </thead>
              <tbody id="sales-table-body" class="divide-y divide-slate-100"><!-- Sales will be inserted here -->
              </tbody>
            </table>
          </div>
        </div>
      </div><!-- Reports View -->
      <div id="view-reports" class="flex-1 p-6 overflow-y-auto hidden">
        <div class="max-w-6xl mx-auto">
          <div class="mb-6">
            <h2 class="text-xl font-semibold text-slate-800">Reports &amp; Analytics</h2>
            <p class="text-sm text-muted">Track your business performance</p>
          </div><!-- Stats Cards -->
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <div class="bg-white p-4 rounded-lg border border-slate-200">
              <div class="flex items-center justify-between">
                <div>
                  <p class="text-xs text-muted uppercase font-medium">Today's Sales</p>
                  <p class="text-2xl font-bold text-slate-800 mt-1" id="stat-today-sales">$0.00</p>
                </div>
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                  <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                </div>
              </div>
            </div>
            <div class="bg-white p-4 rounded-lg border border-slate-200">
              <div class="flex items-center justify-between">
                <div>
                  <p class="text-xs text-muted uppercase font-medium">Today's Profit</p>
                  <p class="text-2xl font-bold text-accent mt-1" id="stat-today-profit">$0.00</p>
                </div>
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                  <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                  </svg>
                </div>
              </div>
            </div>
            <div class="bg-white p-4 rounded-lg border border-slate-200">
              <div class="flex items-center justify-between">
                <div>
                  <p class="text-xs text-muted uppercase font-medium">Items Sold</p>
                  <p class="text-2xl font-bold text-slate-800 mt-1" id="stat-items-sold">0</p>
                </div>
                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                  <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                  </svg>
                </div>
              </div>
            </div>
            <div class="bg-white p-4 rounded-lg border border-slate-200">
              <div class="flex items-center justify-between">
                <div>
                  <p class="text-xs text-muted uppercase font-medium">Transactions</p>
                  <p class="text-2xl font-bold text-slate-800 mt-1" id="stat-transactions">0</p>
                </div>
                <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                  <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                  </svg>
                </div>
              </div>
            </div>
          </div><!-- Low Stock Alert -->
          <div class="bg-white rounded-lg border border-slate-200 p-4">
            <h3 class="font-semibold text-slate-800 mb-4">Low Stock Alert</h3>
            <div id="low-stock-list" class="space-y-2"><!-- Low stock items will be inserted here -->
            </div>
          </div>
        </div>
      </div><!-- Settings View -->
      <div id="view-settings" class="flex-1 p-6 overflow-y-auto hidden">
        <div class="max-w-2xl mx-auto">
          <div class="mb-6">
            <h2 class="text-xl font-semibold text-slate-800">Settings</h2>
            <p class="text-sm text-muted">Configure your POS system</p>
          </div>
          <div class="bg-white rounded-lg border border-slate-200 divide-y divide-slate-100">
            <div class="p-4"><label class="block text-sm font-medium text-slate-700 mb-2">Store Name</label> <input type="text" id="setting-store-name" placeholder="Enter store name" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-primary">
            </div>
            <div class="p-4"><label class="block text-sm font-medium text-slate-700 mb-2">Currency Symbol</label> <input type="text" id="setting-currency" value="$" maxlength="3" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-primary">
            </div>
            <div class="p-4"><label class="block text-sm font-medium text-slate-700 mb-2">Tax Rate (%)</label> <input type="number" id="setting-tax-rate" value="0" min="0" max="100" step="0.1" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-primary">
            </div>
            <div class="p-4"><label class="block text-sm font-medium text-slate-700 mb-2">Low Stock Threshold</label> <input type="number" id="setting-low-stock" value="10" min="1" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-primary">
            </div>
            <div class="p-4"><button onclick="saveSettings()" class="px-4 py-2 bg-primary text-white rounded-lg font-medium text-sm hover:bg-blue-700"> Save Settings </button>
            </div>
          </div>
        </div>
      </div><!-- Complete Sale Page -->
      <div id="view-complete-sale" class="flex-1 p-6 overflow-y-auto hidden">
        <div class="max-w-2xl mx-auto">
          <div class="flex items-center gap-3 mb-6"><button onclick="switchView('pos')" class="p-2 hover:bg-slate-100 rounded-lg">
              <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewbox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
              </svg></button>
            <div>
              <h2 class="text-xl font-semibold text-slate-800">Complete Sale</h2>
              <p class="text-sm text-muted">Process payment and finalize transaction</p>
            </div>
          </div>
          <div class="bg-white rounded-lg border border-slate-200 p-6 space-y-6"><!-- Receipt Preview -->
            <div class="bg-slate-50 border border-slate-200 rounded-lg p-4 font-mono text-sm space-y-2">
              <div class="text-center pb-2 border-b border-slate-200">
                <p class="font-semibold">Receipt</p>
              </div>
              <div id="sale-items-preview" class="space-y-1">
                <p class="text-muted">No items in cart</p>
              </div>
              <div class="border-t border-slate-200 pt-2 space-y-1">
                <div class="flex justify-between"><span>Subtotal:</span> <span id="sale-subtotal">$0.00</span>
                </div>
                <div class="flex justify-between"><span>Tax:</span> <span id="sale-tax">$0.00</span>
                </div>
                <div class="flex justify-between font-bold text-base"><span>Total:</span> <span id="sale-total">$0.00</span>
                </div>
              </div>
            </div><!-- Payment Details -->
            <div class="space-y-4">
              <div><label class="block text-sm font-medium text-slate-700 mb-1">Amount Paid</label> <input type="number" id="complete-paid-amount" placeholder="0.00" step="0.01" min="0" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-primary">
              </div>
              <div><label class="block text-sm font-medium text-slate-700 mb-1">Payment Method</label> <select id="complete-payment-method" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-primary">
                  <option value="cash">Cash</option>
                  <option value="card">Card</option>
                  <option value="mobile">Mobile</option>
                </select>
              </div>
              <div class="bg-green-50 border border-green-200 rounded-lg p-3">
                <div class="flex justify-between text-sm"><span class="text-green-700">Change Due:</span> <span class="font-bold text-green-700" id="complete-change">$0.00</span>
                </div>
              </div>
            </div><!-- Action Buttons -->
            <div class="flex justify-end gap-2"><button onclick="switchView('pos')" class="px-4 py-2 text-slate-600 hover:bg-slate-200 rounded-lg font-medium text-sm">Cancel</button> <button onclick="finalizeSale()" class="px-4 py-2 bg-accent text-white rounded-lg font-medium text-sm hover:bg-green-700">Finalize Sale</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    // Initialize Element SDK for UI/UX only
    const defaultConfig = {
      store_name: 'QuickMart POS',
      currency_symbol: '$'
    };

    if (window.elementSdk) {
      window.elementSdk.init({
        defaultConfig,
        onConfigChange: async (newConfig) => {
          document.getElementById('store-name').textContent = newConfig.store_name || defaultConfig.store_name;
          document.getElementById('setting-store-name').value = newConfig.store_name || defaultConfig.store_name;
        },
        mapToCapabilities: (cfg) => ({
          recolorables: [],
          borderables: [],
          fontEditable: undefined,
          fontSizeable: undefined
        }),
        mapToEditPanelValues: (cfg) => new Map([
          ['store_name', cfg.store_name || defaultConfig.store_name],
          ['currency_symbol', cfg.currency_symbol || defaultConfig.currency_symbol]
        ])
      });
    }

    // UI Only - Sample Data Display
    const categories = [{
        id: 1,
        name: 'Beverages'
      },
      {
        id: 2,
        name: 'Snacks'
      },
      {
        id: 3,
        name: 'Dairy'
      },
      {
        id: 4,
        name: 'Bakery'
      },
      {
        id: 5,
        name: 'Frozen'
      },
      {
        id: 6,
        name: 'Grocery'
      }
    ];

    const products = [{
        id: 1,
        name: 'Coca Cola 500ml',
        barcode: '8901234567890',
        categoryId: 1,
        cost: 0.80,
        price: 1.50,
        stock: 50
      },
      {
        id: 2,
        name: 'Pepsi 500ml',
        barcode: '8901234567891',
        categoryId: 1,
        cost: 0.75,
        price: 1.50,
        stock: 45
      },
      {
        id: 3,
        name: 'Sprite 500ml',
        barcode: '8901234567892',
        categoryId: 1,
        cost: 0.80,
        price: 1.50,
        stock: 40
      },
      {
        id: 4,
        name: 'Lays Classic 150g',
        barcode: '8902345678901',
        categoryId: 2,
        cost: 1.20,
        price: 2.50,
        stock: 30
      },
      {
        id: 5,
        name: 'Doritos Nacho 180g',
        barcode: '8902345678902',
        categoryId: 2,
        cost: 1.50,
        price: 3.00,
        stock: 25
      },
      {
        id: 6,
        name: 'Pringles Original',
        barcode: '8902345678903',
        categoryId: 2,
        cost: 2.00,
        price: 3.50,
        stock: 20
      },
      {
        id: 7,
        name: 'Fresh Milk 1L',
        barcode: '8903456789012',
        categoryId: 3,
        cost: 1.00,
        price: 1.80,
        stock: 60
      },
      {
        id: 8,
        name: 'Greek Yogurt 500g',
        barcode: '8903456789013',
        categoryId: 3,
        cost: 2.50,
        price: 4.00,
        stock: 35
      },
      {
        id: 9,
        name: 'Cheddar Cheese 250g',
        barcode: '8903456789014',
        categoryId: 3,
        cost: 3.00,
        price: 5.50,
        stock: 25
      },
      {
        id: 10,
        name: 'White Bread Loaf',
        barcode: '8904567890123',
        categoryId: 4,
        cost: 1.00,
        price: 2.00,
        stock: 40
      },
      {
        id: 11,
        name: 'Croissant 4-pack',
        barcode: '8904567890124',
        categoryId: 4,
        cost: 2.00,
        price: 3.50,
        stock: 20
      },
      {
        id: 12,
        name: 'Chocolate Muffin',
        barcode: '8904567890125',
        categoryId: 4,
        cost: 1.20,
        price: 2.50,
        stock: 30
      },
      {
        id: 13,
        name: 'Ice Cream Vanilla 1L',
        barcode: '8905678901234',
        categoryId: 5,
        cost: 3.00,
        price: 5.00,
        stock: 15
      },
      {
        id: 14,
        name: 'Frozen Pizza',
        barcode: '8905678901235',
        categoryId: 5,
        cost: 4.00,
        price: 7.00,
        stock: 18
      },
      {
        id: 15,
        name: 'Frozen Fries 1kg',
        barcode: '8905678901236',
        categoryId: 5,
        cost: 2.50,
        price: 4.50,
        stock: 22
      },
      {
        id: 16,
        name: 'Rice 5kg',
        barcode: '8906789012345',
        categoryId: 6,
        cost: 5.00,
        price: 8.00,
        stock: 50
      },
      {
        id: 17,
        name: 'Pasta 500g',
        barcode: '8906789012346',
        categoryId: 6,
        cost: 1.00,
        price: 2.00,
        stock: 60
      },
      {
        id: 18,
        name: 'Olive Oil 500ml',
        barcode: '8906789012347',
        categoryId: 6,
        cost: 4.00,
        price: 7.00,
        stock: 25
      }
    ];

    // Update Date/Time Display
    function updateDateTime() {
      const now = new Date();
      document.getElementById('current-date').textContent = now.toLocaleDateString('en-US', {
        weekday: 'short',
        month: 'short',
        day: 'numeric',
        year: 'numeric'
      });
      document.getElementById('current-time').textContent = now.toLocaleTimeString('en-US', {
        hour: '2-digit',
        minute: '2-digit'
      });
    }
    updateDateTime();
    setInterval(updateDateTime, 1000);

    // View Switching
    function switchView(view) {
      const views = ['pos', 'products', 'add-product', 'categories', 'add-category', 'sales', 'reports', 'settings', 'complete-sale'];
      views.forEach(v => {
        document.getElementById(`view-${v}`).classList.add('hidden');
        if (document.getElementById(`nav-${v}`)) {
          document.getElementById(`nav-${v}`).classList.remove('bg-primary', 'text-white');
          document.getElementById(`nav-${v}`).classList.add('text-slate-500');
        }
      });
      document.getElementById(`view-${view}`).classList.remove('hidden');
      if (document.getElementById(`nav-${view}`)) {
        document.getElementById(`nav-${view}`).classList.add('bg-primary', 'text-white');
        document.getElementById(`nav-${view}`).classList.remove('text-slate-500');
      }
    }

    // Render Products Grid (Initial Load)
    function renderProductsGrid() {
      const grid = document.getElementById('products-grid').querySelector('.grid');
      grid.innerHTML = '';
      const categoryFilter = document.getElementById('category-filter');

      categoryFilter.innerHTML = '<option value="all">All Categories</option>';
      categories.forEach(cat => {
        categoryFilter.innerHTML += `<option value="${cat.id}">${cat.name}</option>`;
      });

      products.forEach(product => {
        const category = categories.find(c => c.id === product.categoryId);
        const isLowStock = product.stock <= 10;
        const isOutOfStock = product.stock === 0;

        const card = document.createElement('div');
        card.className = `bg-white rounded-lg border border-slate-200 p-3 cursor-pointer hover:border-primary hover:shadow-sm transition-all ${isOutOfStock ? 'opacity-50' : ''}`;
        card.innerHTML = `
          <div class="flex items-start justify-between mb-2">
            <span class="text-xs px-2 py-0.5 rounded-full ${isLowStock ? 'bg-red-100 text-red-700' : 'bg-slate-100 text-slate-600'}">${isOutOfStock ? 'Out of stock' : product.stock + ' in stock'}</span>
            <button class="w-6 h-6 bg-primary text-white rounded-full flex items-center justify-center hover:bg-blue-700 ${isOutOfStock ? 'hidden' : ''}" title="Add to cart">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
              </svg>
            </button>
          </div>
          <div class="w-full h-16 bg-slate-100 rounded-lg flex items-center justify-center mb-2">
            <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
            </svg>
          </div>
          <h3 class="text-sm font-medium text-slate-800 truncate mb-1">${product.name}</h3>
          <p class="text-xs text-muted mb-2">${category?.name || 'Uncategorized'}</p>
          <p class="text-base font-bold text-primary">$${product.price.toFixed(2)}</p>
        `;
        grid.appendChild(card);
      });
    }

    // Render Products Table
    function renderProductsTable() {
      const tbody = document.getElementById('products-table-body');
      tbody.innerHTML = '';

      products.forEach(product => {
        const category = categories.find(c => c.id === product.categoryId);
        const isLowStock = product.stock <= 10;
        const tr = document.createElement('tr');
        tr.className = 'hover:bg-slate-50';
        tr.innerHTML = `
          <td class="px-4 py-3">
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 bg-slate-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
              </div>
              <span class="font-medium text-slate-800">${product.name}</span>
            </div>
          </td>
          <td class="px-4 py-3 text-sm text-muted">${product.barcode}</td>
          <td class="px-4 py-3">
            <span class="text-xs px-2 py-1 bg-slate-100 rounded-full text-slate-600">${category?.name || 'N/A'}</span>
          </td>
          <td class="px-4 py-3 text-right text-sm">$${product.cost.toFixed(2)}</td>
          <td class="px-4 py-3 text-right text-sm font-medium">$${product.price.toFixed(2)}</td>
          <td class="px-4 py-3 text-right">
            <span class="text-sm ${isLowStock ? 'text-danger font-medium' : ''}">${product.stock}</span>
          </td>
          <td class="px-4 py-3 text-center">
            <div class="flex items-center justify-center gap-1">
              <button class="p-1.5 text-slate-400 hover:text-primary hover:bg-slate-100 rounded" title="Edit">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
              </button>
              <button class="p-1.5 text-slate-400 hover:text-danger hover:bg-red-50 rounded" title="Delete">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
              </button>
            </div>
          </td>
        `;
        tbody.appendChild(tr);
      });
    }

    // Render Categories Grid
    function renderCategoriesGrid() {
      const grid = document.getElementById('categories-grid');
      grid.innerHTML = '';

      categories.forEach(cat => {
        const productCount = products.filter(p => p.categoryId === cat.id).length;
        const card = document.createElement('div');
        card.className = 'bg-white rounded-lg border border-slate-200 p-4';
        card.innerHTML = `
          <div class="flex items-start justify-between mb-3">
            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
              <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
              </svg>
            </div>
            <div class="flex items-center gap-1">
              <button class="p-1.5 text-slate-400 hover:text-primary hover:bg-slate-100 rounded" title="Edit">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
              </button>
              <button class="p-1.5 text-slate-400 hover:text-danger hover:bg-red-50 rounded" title="Delete">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
              </button>
            </div>
          </div>
          <h3 class="font-semibold text-slate-800 mb-1">${cat.name}</h3>
          <p class="text-sm text-muted">${productCount} products</p>
        `;
        grid.appendChild(card);
      });
    }

    // Render Sales Table
    function renderSalesTable() {
      const tbody = document.getElementById('sales-table-body');
      tbody.innerHTML = `
        <tr>
          <td colspan="7" class="px-4 py-8 text-center text-muted">
            No sales recorded yet. Sales will appear here after transactions.
          </td>
        </tr>
      `;
    }

    // Render Reports
    function renderReports() {
      document.getElementById('stat-today-sales').textContent = '$0.00';
      document.getElementById('stat-today-profit').textContent = '$0.00';
      document.getElementById('stat-items-sold').textContent = '0';
      document.getElementById('stat-transactions').textContent = '0';
      document.getElementById('low-stock-list').innerHTML = '<p class="text-sm text-muted">All products are well stocked</p>';
    }

    // Stub Functions (UI Only - no functionality)
    function clearCart() {}

    function holdSale() {}

    function saveProduct() {}

    function saveCategory() {}

    function saveSettings() {}

    function finalizeSale() {}

    // Initialize
    renderProductsGrid();
    renderProductsTable();
    renderCategoriesGrid();
    renderSalesTable();
    renderReports();
    document.getElementById('setting-store-name').value = defaultConfig.store_name;
    document.getElementById('setting-currency').value = defaultConfig.currency_symbol;
  </script>
  <script>
    (function() {
      function c() {
        var b = a.contentDocument || a.contentWindow.document;
        if (b) {
          var d = b.createElement('script');
          d.innerHTML = "window.__CF$cv$params={r:'9d8bc8cca61db2fd',t:'MTc3MjkwOTQxMi4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
          b.getElementsByTagName('head')[0].appendChild(d)
        }
      }
      if (document.body) {
        var a = document.createElement('iframe');
        a.height = 1;
        a.width = 1;
        a.style.position = 'absolute';
        a.style.top = 0;
        a.style.left = 0;
        a.style.border = 'none';
        a.style.visibility = 'hidden';
        document.body.appendChild(a);
        if ('loading' !== document.readyState) c();
        else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c);
        else {
          var e = document.onreadystatechange || function() {};
          document.onreadystatechange = function(b) {
            e(b);
            'loading' !== document.readyState && (document.onreadystatechange = e, c())
          }
        }
      }
    })();
  </script>
</body>

</html>