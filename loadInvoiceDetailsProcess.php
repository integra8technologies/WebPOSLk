<?php
include "connection.php";

$query = "SELECT * FROM `invoice` ORDER BY `date` DESC, `time` DESC";
$rs = Database::search($query);
$num = $rs->num_rows;

$total_revenue = 0;

// Buffer the rows so we can calculate the total revenue while iterating
$rows_html = "";

if ($num > 0) {
    while ($d = $rs->fetch_assoc()) {
        $total_revenue += $d["total"]; // Summing up the total revenue
        
        $rows_html .= '
        <tr class="hover:bg-slate-50/50 transition-colors">
            <td class="px-6 py-4 font-mono text-sm font-bold text-blue-900">' . $d["inv"] . '</td>
            <td class="px-6 py-4">
                <div class="text-sm text-slate-800">' . $d["date"] . '</div>
                <div class="text-xs text-slate-400">' . $d["time"] . '</div>
            </td>
            <td class="px-6 py-4 text-sm text-slate-600 italic">' . $d["product_name"] . '</td>
            <td class="px-6 py-4">
                <div class="flex items-center gap-2">
                    <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                    <span class="text-xs font-medium text-slate-700 uppercase">' . $d["count"] . ' Items</span>
                </div>
            </td>
            <td class="px-6 py-4 text-sm font-bold text-slate-900">Rs. ' . number_format($d["subtotal"], 2) . '</td>
            <td class="px-6 py-4 text-sm font-bold text-blue-700">Rs. ' . number_format($d["total"], 2) . '</td>
        </tr>';
    }
} else {
    $rows_html = '<tr><td colspan="6" class="px-6 py-10 text-center text-slate-400 italic">No sales history available.</td></tr>';
}

// 1. Send the hidden data points
echo "<input type='hidden' id='invoice_count_hidden' value='" . $num . "' />";

// 2. Send the table rows
echo $rows_html;
?>