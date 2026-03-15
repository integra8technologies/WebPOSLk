<?php
include "connection.php";
session_start();

if (isset($_SESSION["a"])) {
    $user_session = $_SESSION["a"];
    $user_rs = Database::search("SELECT * FROM `user` WHERE `username`='" . $user_session["username"] . "'");
    $user_data = $user_rs->fetch_assoc();
?>
    <!doctype html>
    <html lang="en" class="h-full">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title>WebPOSLk | Dashboard</title>
        <script src="https://cdn.tailwindcss.com/3.4.17"></script>
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
        <style>
            * { font-family: 'IBM Plex Sans', sans-serif; -webkit-tap-highlight-color: transparent; }
            .scrollbar-thin::-webkit-scrollbar { width: 5px; }
            .scrollbar-thin::-webkit-scrollbar-track { background: #f1f5f9; }
            .scrollbar-thin::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }

            /* Cart Drawer Animation */
            #cartSidebar { transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
            
            /* Prevent body scroll when mobile menu/cart is open */
            .no-scroll { overflow: hidden; }
        </style>
    </head>

    <body class="h-full bg-slate-100 overflow-hidden" onload="loadProducts();">
        
        <div id="cartOverlay" onclick="toggleMobileCart()" class="fixed inset-0 bg-slate-900/40 z-[45] hidden backdrop-blur-sm transition-opacity duration-300"></div>

        <div id="app" class="h-full flex flex-col">

            <header class="bg-white border-b border-slate-200 px-4 md:px-8 py-3 flex items-center justify-between flex-shrink-0 z-50 shadow-sm">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 md:w-12 md:h-12 flex-shrink-0">
                        <img src="./assets/img/POSLOGO.png" alt="Logo" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <h1 class="text-xl md:text-2xl font-bold text-slate-800 tracking-tight">
                            WebPOS<span class="text-blue-700">LK</span>
                        </h1>
                    </div>
                </div>

                <div class="flex items-center gap-2 md:gap-4">
                    <button onclick="toggleMobileCart()" class="xl:hidden flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-xl font-bold shadow-md active:scale-95 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span class="hidden sm:inline">View Cart</span>
                    </button>

                    <div class="hidden sm:flex items-center gap-3 border-l border-slate-200 ml-2 pl-4">
                        <div class="text-right">
                            <p class="text-xs font-bold text-slate-800 leading-none"><?php echo $user_data['username']; ?></p>
                            <p class="text-[10px] text-emerald-500 font-bold uppercase tracking-wider">Online</p>
                        </div>
                        <img src="https://ui-avatars.com/api/?name=<?php echo $user_data['username']; ?>&background=eff6ff&color=1d4ed8" class="w-10 h-10 rounded-full border border-slate-100">
                    </div>
                </div>
            </header>

            <div class="flex-1 flex overflow-hidden">
                
                <aside class="fixed bottom-0 left-0 w-full bg-white border-t border-slate-200 flex sm:static sm:w-20 sm:flex-col sm:border-t-0 sm:border-r items-center py-2 sm:py-6 gap-2 sm:gap-6 z-[49]">
                    <a href="pos.php" class="flex-1 sm:flex-none p-3 text-blue-700 bg-blue-50 rounded-xl sm:rounded-2xl shadow-sm">
                        <svg class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </a>
                    <a href="productManagement.php" class="flex-1 sm:flex-none p-3 text-slate-400 hover:text-blue-700"><svg class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg></a>
                    <a href="salesHistory.php" class="flex-1 sm:flex-none p-3 text-slate-400 hover:text-blue-700"><svg class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></a>
                    <a href="settings.php" class="flex-1 sm:flex-none p-3 text-slate-400 sm:mt-auto hover:text-blue-700"><svg class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path></svg></a>
                </aside>

                <main class="flex-1 flex flex-col overflow-hidden p-4 md:p-6 pb-20 sm:pb-6">
                    <div class="mb-6">
                        <div class="relative max-w-xl">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </span>
                            <input type="text" id="searchInput" onkeyup="loadProducts();" placeholder="Search products..." class="w-full pl-12 pr-4 py-3.5 bg-white border border-slate-200 rounded-2xl outline-none focus:border-blue-500 shadow-sm transition-all">
                        </div>
                    </div>

                    <div class="flex-1 overflow-y-auto scrollbar-thin" id="productBody">
                        </div>
                </main>

                <div id="cartSidebar" class="fixed inset-y-0 right-0 w-[90%] sm:w-[450px] xl:w-96 bg-white border-l border-slate-200 flex flex-col shadow-2xl z-50 transform translate-x-full xl:translate-x-0 xl:static transition-transform duration-300">
                    
                    <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-white sticky top-0">
                        <div>
                            <h2 class="font-bold text-slate-800 text-xl">Current Order</h2>
                            <p class="text-xs text-slate-400">INV-<?php echo rand(1000, 9999); ?></p>
                        </div>
                        <button onclick="toggleMobileCart()" class="xl:hidden p-2 bg-slate-100 rounded-full text-slate-500 hover:bg-rose-50 hover:text-rose-500 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>

                    <div class="flex-1 overflow-y-auto p-4 space-y-3" id="cartContainer">
                        </div>

                    <div class="p-6 bg-slate-50 border-t border-slate-200 space-y-4">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-slate-500 font-semibold">Subtotal</span>
                            <span id="subtotal" class="text-slate-800 font-bold">Rs. 0.00</span>
                        </div>
                        <div class="flex justify-between items-center border-t border-slate-200 pt-4">
                            <span class="text-slate-900 font-bold">Total Payable</span>
                            <span id="totalPayable" class="text-2xl font-black text-blue-700">Rs. 0.00</span>
                        </div>
                        <button onclick="toggleReceiptModal()" class="w-full py-4 bg-blue-700 text-white rounded-2xl font-bold shadow-lg shadow-blue-200 hover:bg-blue-800 transition-all active:scale-[0.98]">
                            Complete Transaction
                        </button>
                        <button onclick="clearCart()" class="w-full py-2 text-rose-500 font-bold text-sm uppercase tracking-widest hover:bg-rose-50 rounded-xl transition-all">
                            Clear Order
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function toggleMobileCart() {
                const cart = document.getElementById('cartSidebar');
                const overlay = document.getElementById('cartOverlay');
                const isHidden = cart.classList.contains('translate-x-full');
                
                if (isHidden) {
                    cart.classList.remove('translate-x-full');
                    overlay.classList.remove('hidden');
                    document.body.classList.add('no-scroll');
                } else {
                    cart.classList.add('translate-x-full');
                    overlay.classList.add('hidden');
                    document.body.classList.remove('no-scroll');
                }
            }

            function toggleReceiptModal() {
                const modal = document.getElementById('receiptModal');
                if(modal) {
                    modal.style.display = (modal.style.display === 'flex') ? 'none' : 'flex';
                }
            }
        </script>
        <script src="./assets/js/script.js"></script>
    </body>
    </html>
<?php
} else {
    header("Location: index.php");
    exit();
}
?>