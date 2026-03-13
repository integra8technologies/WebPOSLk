<?php
include "connection.php";
session_start();

// Final Gatekeeper Logic
if (isset($_SESSION["a"])) {
  $user_session = $_SESSION["a"]; // This holds the session data

  // Fetch the specific user from the database
  // We use the email (or whichever unique ID you store in session) to find the right record
  $user_rs = Database::search("SELECT * FROM `user` WHERE `username`='" . $user_session["username"] . "'");
  $user_data = $user_rs->fetch_assoc();
?>
  <!doctype html>
  <html lang="en" class="h-full">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebPOSLk | Dashboard</title>
    <script src="https://cdn.tailwindcss.com/3.4.17"></script>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
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

      /* Card Hover Effects */
      .product-card:hover .add-overlay {
        opacity: 1;
        transform: translateY(0);
      }

      .add-overlay {
        transform: translateY(10px);
        transition: all 0.3s ease;
      }
    </style>
  </head>

  <body class="h-full bg-slate-100 overflow-hidden" onload="loadProducts();">
    <div id="app" class="h-full flex flex-col">

      <header class="bg-white border-b border-slate-200 px-6 py-3 flex items-center justify-between flex-shrink-0">
        <div class="flex items-center gap-5">
          <div class="w-16 h-16 flex-shrink-0 flex items-center justify-center">
            <img src="./assets/img/POSLOGO.png" alt="QuickMart Logo" class="w-full h-full object-contain">
          </div>

          <div class="flex flex-col justify-center">
            <h1 class="text-2xl font-black text-slate-800 tracking-tighter leading-none">
              WebPOS <span class="text-blue-800">LK</span>
            </h1>
            <p class="text-[10px] text-slate-400 uppercase font-bold tracking-[0.3em] leading-none mt-2">
              Apex Sales Engine
            </p>
          </div>
        </div>

        <div class="flex items-center gap-6">
          <div class="hidden md:flex flex-col text-right">
            <span class="text-xs font-bold text-slate-700">
              <?php echo $user_data['username']; ?>
            </span>
            <span class="text-[10px] text-emerald-500 font-bold uppercase">System Online</span>
          </div>
          <div class="w-10 h-10 bg-slate-200 rounded-full border-2 border-white shadow-sm overflow-hidden">
            <img src="https://ui-avatars.com/api/?name=Admin&background=f1f5f9&color=64748b" alt="User">
          </div>
        </div>
      </header>

      <div class="flex-1 flex overflow-hidden">
        <aside class="w-20 bg-white border-r border-slate-200 flex flex-col items-center py-6 gap-6 flex-shrink-0">

          <a href="pos.php" class="w-12 h-12 rounded-2xl flex items-center justify-center bg-blue-50 text-blue-800 border border-blue-100 cursor-pointer shadow-sm">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
          </a>

          <a href="productManagement.php" class="w-12 h-12 rounded-2xl flex items-center justify-center text-slate-400 hover:bg-slate-50 hover:text-blue-800 cursor-pointer transition-all">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
            </svg>
          </a>

          <a href="viewCategories.php" class="w-12 h-12 rounded-2xl flex items-center justify-center text-slate-400 hover:bg-slate-50 hover:text-blue-800 cursor-pointer transition-all">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
            </svg>
          </a>

          <a href="salesHistory.php" class="w-12 h-12 rounded-2xl flex items-center justify-center text-slate-400 hover:bg-slate-50 hover:text-blue-800 cursor-pointer transition-all">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
          </a>

          <a href="report.php" class="w-12 h-12 rounded-2xl flex items-center justify-center text-slate-400 hover:bg-slate-50 hover:text-blue-800 cursor-pointer transition-all">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
          </a>

          <a href="settings.php" class="w-12 h-12 rounded-2xl flex items-center justify-center text-slate-400 hover:bg-slate-50 hover:text-blue-800 cursor-pointer transition-all mt-auto">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
          </a>

        </aside>

        <div class="flex-1 flex overflow-hidden">
          <div class="flex-1 flex flex-col overflow-hidden p-6">
            <div class="flex items-center gap-4 mb-6 flex-shrink-0">
              <div class="flex-1 relative">
                <svg class="w-5 h-5 text-slate-400 absolute left-4 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <input type="text" id="searchInput" onkeyup="loadProducts();" placeholder="Search product name..." class="w-full pl-12 pr-4 py-3 bg-white border border-slate-200 rounded-xl text-sm outline-none focus:ring-4 focus:ring-blue-500/5 focus:border-blue-500 transition-all">
              </div>
            </div>

            <div class="flex-1 overflow-y-auto scrollbar-thin pr-2" id="productBody">
            </div>
          </div>

          <div class="w-96 bg-white border-l border-slate-200 flex flex-col flex-shrink-0 shadow-2xl">
            <div class="p-6 border-b border-slate-100">
              <div class="flex items-center justify-between mb-1">
                <h2 class="font-bold text-slate-800 text-lg">Invoice Cart</h2>
                <button onclick="clearCart()" class="text-[10px] font-bold text-rose-500 uppercase tracking-widest hover:underline">Clear Order</button>
              </div>
              <p class="text-xs text-slate-400 font-medium">
                Ref: #INV-2026-<span id="invoiceNumber"><?php echo rand(1000, 9999); ?></span>
              </p>
            </div>

            <div class="flex-1 overflow-y-auto p-4 space-y-3" id="cartContainer">
              <!--- cart product--->
            </div>

            <div class="border-t border-slate-100 p-6 space-y-4 bg-slate-50/50">
              <div class="space-y-3">
                <div class="flex justify-between text-sm">
                  <span class="text-slate-500 font-medium">Subtotal</span>
                  <span class="font-bold text-slate-700" id="subtotal">Rs. 0.00</span>
                </div>
                <div class="flex justify-between pt-4 border-t border-slate-200">
                  <span class="font-bold text-slate-900">Total Payable</span>
                  <span class="font-black text-2xl text-blue-800" id="totalPayable">Rs. 0.00</span>
                </div>
              </div>
              <button onclick="toggleReceiptModal()" class="w-full py-4 bg-blue-800 text-white rounded-2xl font-bold shadow-lg shadow-blue-800/20 hover:bg-blue-900 transition-all active:scale-[0.98]">
                Proceed to Payment
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="receiptModal" style="display: none;" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm items-center justify-center z-[9999]">
      <div class="w-[340px] bg-white p-6 rounded-[30px] shadow-2xl relative animate-modalPop">
        <button onclick="toggleReceiptModal()" class="absolute top-4 right-4 w-8 h-8 bg-slate-50 rounded-full text-slate-400 flex items-center justify-center hover:bg-slate-100 transition-all">✕</button>
        <div class="text-center mb-6">
          <div class="w-12 h-12 bg-blue-800 rounded-2xl flex items-center justify-center text-white font-black text-xl mx-auto mb-3 shadow-lg shadow-blue-800/20">QM</div>
          <h2 class="text-sm font-black text-slate-800 uppercase tracking-widest">WebPOS LK</h2>
          <p id="receiptRefDisplay" class="text-[10px] text-slate-400 font-bold mt-1">OFFICIAL RECEIPT</p>
        </div>
        <div class="border-t border-dashed border-slate-200 my-4"></div>
        <div class="space-y-3 mb-6">
          <div class="flex justify-between text-xs font-bold text-slate-800">
            <span>1x Sample Electronics</span>
            <span>Rs. 1,500.00</span>
          </div>
        </div>
        <div class="bg-slate-50 p-4 rounded-2xl mb-6">
          <div class="flex justify-between text-[10px] text-slate-400 font-bold uppercase mb-1">
            <span>Subtotal</span>
            <span>Rs. 1,500.00</span>
          </div>
          <div class="flex justify-between text-lg font-black text-blue-800 border-t border-slate-200 pt-2 mt-2">
            <span>Total</span>
            <span>Rs. 1,500.00</span>
          </div>
        </div>
        <button id="printBtn" onclick="printAndSave()" class="w-full py-3 bg-slate-100 text-blue-800 font-bold rounded-xl hover:bg-blue-50 transition-all">
          Print Receipt
        </button>
      </div>
    </div>
    <style>
      @keyframes modalPop {
        from {
          opacity: 0;
          transform: scale(0.9);
        }

        to {
          opacity: 1;
          transform: scale(1);
        }
      }

      .animate-modalPop {
        animation: modalPop 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
      }
    </style>


    <script src="./assets/js/script.js"></script>
  </body>

  </html>
<?php
} else {
  header("Location: index.php");
  exit();
}
?>