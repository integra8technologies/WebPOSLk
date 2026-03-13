<!doctype html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports & Analytics | WebPOSLk</title>
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

        .chart-bar {
            transition: height 0.6s ease-in-out;
        }
    </style>
</head>

<body class="h-full bg-slate-50 overflow-hidden">
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
                <div class="flex bg-slate-100 p-1 rounded-lg border border-slate-200">
                    <button class="px-3 py-1.5 text-xs font-bold bg-white text-indigo-900 rounded shadow-sm">Daily</button>
                    <button class="px-3 py-1.5 text-xs font-bold text-slate-500 hover:text-slate-700">Weekly</button>
                    <button class="px-3 py-1.5 text-xs font-bold text-slate-500 hover:text-slate-700">Monthly</button>
                </div>
                <button class="px-4 py-2 bg-indigo-900 text-white rounded-lg text-sm font-medium hover:bg-indigo-950 transition-all flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Export PDF
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

                <a href="salesHistory.php" class="w-12 h-12 rounded-2xl flex items-center justify-center text-slate-400 hover:bg-slate-50 hover:text-blue-800 cursor-pointer transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </a>

                <a href="report.php" class="w-12 h-12 rounded-2xl flex items-center justify-center bg-blue-50 text-blue-800 border border-blue-100 cursor-pointer shadow-sm">
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

            <main class="flex-1 overflow-y-auto p-6 scrollbar-thin">

                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                    <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Net Sales</p>
                        <h3 class="text-2xl font-bold text-slate-800">$42,850.00</h3>
                        <div class="mt-2 flex items-center gap-1 text-emerald-600 font-bold text-xs">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"></path>
                            </svg>
                            +12.5%
                        </div>
                    </div>
                    <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Average Order</p>
                        <h3 class="text-2xl font-bold text-slate-800">$84.20</h3>
                        <div class="mt-2 text-slate-400 text-xs font-medium">vs $78.10 last month</div>
                    </div>
                    <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Total Orders</p>
                        <h3 class="text-2xl font-bold text-slate-800">512</h3>
                        <div class="mt-2 flex items-center gap-1 text-rose-600 font-bold text-xs">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12 13a1 1 0 110 2H7a1 1 0 01-1-1V9a1 1 0 112 0v2.586l4.293-4.293a1 1 0 011.414 0L12 9.586l4.293-4.293a1 1 0 111.414 1.414l-5 5a1 1 0 01-1.414 0L11 9.414 7.414 13H12z" clip-rule="evenodd"></path>
                            </svg>
                            -2.4%
                        </div>
                    </div>
                    <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Net Profit</p>
                        <h3 class="text-2xl font-bold text-indigo-900">$18,400.00</h3>
                        <div class="mt-2 text-emerald-600 text-xs font-bold">42.9% Margin</div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div class="lg:col-span-2 bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                        <div class="flex items-center justify-between mb-8">
                            <h4 class="font-bold text-slate-700">Revenue Flow</h4>
                            <div class="flex items-center gap-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-3 h-3 rounded-full bg-indigo-900"></div><span class="text-xs text-slate-500">Current</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="w-3 h-3 rounded-full bg-slate-200"></div><span class="text-xs text-slate-500">Previous</span>
                                </div>
                            </div>
                        </div>
                        <div class="h-64 flex items-end justify-between gap-2 px-2 border-b border-slate-100 relative">
                            <div class="absolute inset-0 flex flex-col justify-between pointer-events-none opacity-50">
                                <div class="border-t border-slate-50 w-full h-0"></div>
                                <div class="border-t border-slate-50 w-full h-0"></div>
                                <div class="border-t border-slate-50 w-full h-0"></div>
                            </div>
                            <div class="flex-1 flex flex-col justify-end items-center group">
                                <div class="w-full bg-indigo-900 rounded-t-sm h-32 group-hover:bg-indigo-700 transition-all"></div>
                                <span class="text-[10px] text-slate-400 mt-2 font-bold">MON</span>
                            </div>
                            <div class="flex-1 flex flex-col justify-end items-center group">
                                <div class="w-full bg-indigo-900 rounded-t-sm h-48 group-hover:bg-indigo-700 transition-all"></div>
                                <span class="text-[10px] text-slate-400 mt-2 font-bold">TUE</span>
                            </div>
                            <div class="flex-1 flex flex-col justify-end items-center group">
                                <div class="w-full bg-indigo-900 rounded-t-sm h-56 group-hover:bg-indigo-700 transition-all"></div>
                                <span class="text-[10px] text-slate-400 mt-2 font-bold">WED</span>
                            </div>
                            <div class="flex-1 flex flex-col justify-end items-center group">
                                <div class="w-full bg-indigo-900 rounded-t-sm h-40 group-hover:bg-indigo-700 transition-all"></div>
                                <span class="text-[10px] text-slate-400 mt-2 font-bold">THU</span>
                            </div>
                            <div class="flex-1 flex flex-col justify-end items-center group">
                                <div class="w-full bg-indigo-900 rounded-t-sm h-60 group-hover:bg-indigo-700 transition-all"></div>
                                <span class="text-[10px] text-slate-400 mt-2 font-bold">FRI</span>
                            </div>
                            <div class="flex-1 flex flex-col justify-end items-center group">
                                <div class="w-full bg-indigo-500 rounded-t-sm h-24 group-hover:bg-indigo-400 transition-all"></div>
                                <span class="text-[10px] text-slate-400 mt-2 font-bold">SAT</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex flex-col">
                        <h4 class="font-bold text-slate-700 mb-6">Top Performing Categories</h4>
                        <div class="space-y-6 flex-1">
                            <div>
                                <div class="flex justify-between mb-2">
                                    <span class="text-xs font-bold text-slate-600 uppercase">Electronics</span>
                                    <span class="text-xs font-bold text-slate-900">65%</span>
                                </div>
                                <div class="w-full bg-slate-100 rounded-full h-2">
                                    <div class="bg-indigo-900 h-2 rounded-full w-[65%]"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-2">
                                    <span class="text-xs font-bold text-slate-600 uppercase">Beverages</span>
                                    <span class="text-xs font-bold text-slate-900">22%</span>
                                </div>
                                <div class="w-full bg-slate-100 rounded-full h-2">
                                    <div class="bg-indigo-400 h-2 rounded-full w-[22%]"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-2">
                                    <span class="text-xs font-bold text-slate-600 uppercase">Perishables</span>
                                    <span class="text-xs font-bold text-slate-900">13%</span>
                                </div>
                                <div class="w-full bg-slate-100 rounded-full h-2">
                                    <div class="bg-slate-300 h-2 rounded-full w-[13%]"></div>
                                </div>
                            </div>
                        </div>
                        <button class="mt-6 w-full py-3 text-xs font-bold text-indigo-900 bg-indigo-50 border border-indigo-100 rounded-xl hover:bg-indigo-100 transition-all">
                            Detailed Category Report
                        </button>
                    </div>
                </div>

                <div class="mt-6 bg-white border border-slate-200 rounded-2xl shadow-sm">
                    <div class="px-6 py-4 border-b border-slate-100">
                        <h4 class="font-bold text-slate-700">Analytics Insights</h4>
                    </div>
                    <div class="p-6">
                        <div class="flex gap-4 items-start pb-6 border-b border-slate-50">
                            <div class="w-10 h-10 rounded-full bg-indigo-50 text-indigo-900 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-800">Peak Hours Identified</p>
                                <p class="text-xs text-slate-500 mt-1">Sales volumes significantly increase between <span class="font-bold text-indigo-900 underline">2:00 PM - 5:00 PM</span>. Consider increasing staff during this window.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>