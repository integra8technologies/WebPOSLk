<!doctype html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales History | WebPOSLk</title>
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
    </style>
</head>

<body class="h-full bg-slate-50 overflow-hidden" onload="loadAllInvoiceDetails();">
    <div class="h-full flex flex-col">

        <header class="bg-white border-b border-slate-200 px-6 py-4 flex items-center justify-between flex-shrink-0">
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
            <div class="flex gap-3">
                <button class="px-4 py-2 bg-white border border-slate-200 text-slate-700 rounded-lg text-sm font-medium hover:bg-slate-50 transition-all flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Download Report
                </button>
            </div>
        </header>

        <div class="flex-1 flex overflow-hidden">
            <aside class="w-20 bg-white border-r border-slate-200 flex flex-col items-center py-6 gap-6 flex-shrink-0">

                <a href="pos.php" class="w-12 h-12 rounded-2xl flex items-center justify-center text-slate-400 hover:bg-slate-50 hover:text-blue-800 cursor-pointer transition-all">
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

                <a href="salesHistory.php" class="w-12 h-12 rounded-2xl flex items-center justify-center bg-blue-50 text-blue-800 border border-blue-100 cursor-pointer shadow-sm">
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

            <main class="flex-1 overflow-hidden flex flex-col p-6 gap-6">

                <div class="bg-white p-4 rounded-xl border border-slate-200 flex flex-wrap gap-4 items-center shadow-sm">
                    <div class="flex-1 min-w-[250px] relative">
                        <svg class="w-5 h-5 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input type="text" placeholder="Search Invoice ID or Customer..." class="w-full pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-bold text-slate-400 uppercase">Period:</span>
                        <input type="date" class="px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-600 outline-none">
                        <span class="text-slate-300">to</span>
                        <input type="date" class="px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-600 outline-none">
                    </div>
                    <select class="px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-600 outline-none">
                        <option>All Payment Methods</option>
                        <option>Cash</option>
                        <option>Card</option>
                        <option>Online</option>
                    </select>
                </div>

                <div class="flex-1 bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden flex flex-col">
                    <div class="overflow-x-auto overflow-y-auto scrollbar-thin">
                        <table class="w-full text-left border-collapse">
                            <thead class="bg-slate-50 sticky top-0 z-10">
                                <tr class="border-b border-slate-200">
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Invoice ID</th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Date</th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Product Name</th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Count</th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Subtotal</th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Total</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100" id="itb">
                            </tbody>
                        </table>
                    </div>

                    <div class="p-6 bg-slate-900 text-white flex justify-between items-center mt-auto">
                        <div class="flex gap-12">
                            <div>
                                <p class="text-[10px] uppercase tracking-widest text-slate-400 font-bold">Total Invoices</p>
                                <p class="text-2xl font-bold" id="total_invoices_count">0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>


<script src="./assets/js/script.js"></script>

</html>