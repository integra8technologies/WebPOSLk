function adminSignIn() {
  var un = document.getElementById("un");
  var pw = document.getElementById("pw");
  var msgDiv = document.getElementById("msgDiv");
  var msg = document.getElementById("msg");

  msgDiv.style.visibility = "hidden";

  var f = new FormData();
  f.append("u", un.value);
  f.append("p", pw.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText.trim();
      if (response === "Success") {
        window.location = "pos.php";
      } else {
        msg.innerHTML = response;
        msgDiv.style.visibility = "visible";
      }
    }
  };
  request.open("POST", "adminSignInProcess.php", true);
  request.send(f);
}

function previewProductImage(input) {
  const preview = document.getElementById("image-preview");
  const placeholder = document.getElementById("upload-placeholder");
  const overlay = document.getElementById("change-overlay");

  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      preview.src = e.target.result;
      preview.classList.remove("hidden");
      placeholder.classList.add("hidden");
      overlay.classList.remove("hidden");
      overlay.classList.add("flex");
    };
    reader.readAsDataURL(input.files[0]);
  }
}

function regProduct() {
    var pid = document.getElementById("product_id").value;
    var pname = document.getElementById("product_name").value;
    var cat = document.getElementById("product_category").value;
    var basePrice = document.getElementById("product_base_price").value;
    var costPrice = document.getElementById("product_cost_price").value;
    var qty = document.getElementById("product_qty").value;
    var fileInput = document.getElementById("file-upload");
    var msg = document.getElementById("msg1"); // Matches the ID in your HTML

    // Visual feedback
    msg.innerHTML = "";
    
    var form = new FormData();
    form.append("pid", pid);
    form.append("pname", pname);
    form.append("cat", cat);
    form.append("basePrice", basePrice);
    form.append("costPrice", costPrice);
    form.append("qty", qty);

    if (fileInput.files.length > 0) {
        form.append("image", fileInput.files[0]);
    }

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var resp = req.responseText.trim();
            if (resp == "Success") {
                alert("Product " + pname + " registered successfully!");
                location.reload();
            } else {
                msg.innerHTML = resp;
                // Scroll to message so user sees the error
                document.getElementById("msgDiv1").scrollIntoView({ behavior: 'smooth' });
            }
        }
    };

    req.open("POST", "productRegProcess.php", true);
    req.send(form);
}

function saveCategory() {
  var name = document.getElementById("category_name").value;
  var msg = document.getElementById("msg");

  // We use FormData for consistency with your other registration scripts
  var form = new FormData();
  form.append("name", name);

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText.trim();
      if (resp == "Success") {
        alert("Category added successfully!");
        location.reload();
      } else {
        msg.innerHTML = resp;
      }
    }
  };
  req.open("POST", "saveCategoryProcess.php", true);
  req.send(form);
}

function loadProductsDetails() {
    // 1. Get the search term from the input field
    var search = document.getElementById("manageSearch").value;

    var form = new FormData();
    form.append("s", search); // "s" will be accessed in PHP via $_POST["s"]

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            document.getElementById("tb").innerHTML = response;
        }
    };

    // 2. Open as POST to send the search data
    request.open("POST", "loadProductsDetailsProcess.php", true);
    request.send(form);
}

function loadProducts() {
    var search = document.getElementById("searchInput").value;

    var form = new FormData();
    form.append("s", search);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            document.getElementById("productBody").innerHTML = response;
        }
    };

    r.open("POST", "loadProductProcess.php", true);
    r.send(form);
}

function loadCategoryCards() {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            document.getElementById("catItems").innerHTML = response;
        }
    };

    request.open("POST", "loadCategoryCardProcess.php", true);
    request.send();

}

function addToCart(id, name, price, stock) {
    const container = document.getElementById('cartContainer');
    
    // 1. Remove placeholder if it exists
    if (container.querySelector('.text-slate-300')) {
        container.innerHTML = '';
    }

    // 2. Check if item already in cart
    const existing = document.getElementById(`item-${id}`);
    
    if (existing) {
        let qtySpan = existing.querySelector('.qty');
        let currentQty = parseInt(qtySpan.innerText);

        // CHECK IF EXCEEDED: Compare current cart qty + 1 against database stock
        if (currentQty + 1 > stock) {
            alert("⚠️ Stock Exceeded! Only " + stock + " units available for " + name);
            return; // Stop the function here
        }

        qtySpan.innerText = currentQty + 1;
        updateTotals();
        return;
    }

    // 3. Check stock for NEW item addition
    if (stock <= 0) {
        alert("⚠️ " + name + " is out of stock!");
        return;
    }

    // 4. Add new item card (Include stock in the '+' button too)
    const html = `
        <div class="flex items-center gap-4 bg-slate-50 p-3 rounded-2xl border border-slate-100 animate-modalPop" id="item-${id}">
            <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-blue-800 font-bold shadow-sm overflow-hidden">
                ${name.substring(0, 2).toUpperCase()}
            </div>
            <div class="flex-1 overflow-hidden">
                <h4 class="text-sm font-bold text-slate-800 truncate">${name}</h4>
                <p class="text-[10px] font-bold text-slate-400 uppercase">Unit: Rs. ${parseFloat(price).toFixed(2)}</p>
            </div>
            <div class="text-right">
                <p class="text-sm font-black text-slate-800 price-display" data-unit="${price}">Rs. ${parseFloat(price).toLocaleString()}</p>
                <div class="flex items-center gap-2 mt-1">
                    <button onclick="removeFromCart('${id}')" class="w-5 h-5 flex items-center justify-center bg-white border border-slate-200 rounded text-slate-400 hover:text-rose-500">-</button>
                    <span class="text-xs font-bold text-slate-700 qty">1</span>
                    <button onclick="addToCart('${id}', '${name}', ${price}, ${stock})" class="w-5 h-5 flex items-center justify-center bg-white border border-slate-200 rounded text-slate-400 hover:text-blue-800">+</button>
                </div>
            </div>
        </div>`;
    
    container.insertAdjacentHTML('beforeend', html);
    updateTotals();
}

function removeFromCart(id) {
    const item = document.getElementById(`item-${id}`);
    if (item) {
        let qty = item.querySelector('.qty');
        let count = parseInt(qty.innerText);
        if (count > 1) {
            qty.innerText = count - 1;
        } else {
            item.remove();
        }
        updateTotals();
    }
}

function updateTotals() {
    const container = document.getElementById('cartContainer');
    let subtotal = 0;
    
    container.querySelectorAll('[id^="item-"]').forEach(row => {
        const unit = parseFloat(row.querySelector('.price-display').dataset.unit);
        const q = parseInt(row.querySelector('.qty').innerText);
        const total = unit * q;
        row.querySelector('.price-display').innerText = `Rs. ${total.toLocaleString()}`;
        subtotal += total;
    });

    const formattedTotal = "Rs. " + subtotal.toLocaleString(undefined, {minimumFractionDigits: 2});
    document.getElementById('subtotal').innerText = formattedTotal;
    document.getElementById('totalPayable').innerText = formattedTotal;

    if (container.querySelectorAll('[id^="item-"]').length === 0) {
        clearCart();
    }
}

function clearCart() {
    document.getElementById("cartContainer").innerHTML = `
        <div class="flex-1 flex flex-col items-center justify-center text-slate-300 p-8 h-full">
            <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <p class="text-sm font-bold text-slate-400">Cart is currently empty</p>
        </div>`;
    document.getElementById("subtotal").innerText = "Rs. 0.00";
    document.getElementById("totalPayable").innerText = "Rs. 0.00";
}

let currentOrderData = {}; // Global variable to store data for the database

function toggleReceiptModal() {
    const modal = document.getElementById("receiptModal");
    const isOpening = (modal.style.display === "none" || modal.style.display === "");

    if (isOpening) {
        const mainInvoiceRef = document.getElementById("invoiceNumber").innerText;
        const receiptRefDisplay = document.getElementById("receiptRefDisplay");
        
        const now = new Date();
        const dateStr = now.toISOString().split('T')[0]; // YYYY-MM-DD
        const timeStr = now.toTimeString().split(' ')[0]; // HH:MM:SS

        const cartItems = document.querySelectorAll('[id^="item-"]');
        if (cartItems.length === 0) return alert("Cart is empty");

        let cartArray = [];
        let totalAmount = 0;
        let html = "";

        cartItems.forEach(item => {
            const name = item.querySelector('h4').innerText;
            const qty = parseInt(item.querySelector('.qty').innerText);
            const priceText = item.querySelector('.price-display').innerText;
            
            // Clean currency string: Remove "Rs." and commas
            const cleanPrice = parseFloat(priceText.replace("Rs.", "").replace(/,/g, "").trim());
            
            totalAmount += cleanPrice;
            cartArray.push({ name: name, qty: qty });

            html += `
                <div class="flex justify-between text-xs font-bold text-slate-800">
                    <span class="truncate mr-4">${qty}x ${name}</span>
                    <span class="shrink-0">${priceText}.00</span>
                </div>`;
        });

        // Store data for the database process
        currentOrderData = {
            inv: "#INV-2026-" + mainInvoiceRef,
            date: dateStr,
            time: timeStr,
            subtotal: totalAmount,
            total: totalAmount,
            cartData: JSON.stringify(cartArray)
        };

        // UI Updates
        receiptRefDisplay.innerHTML = `OFFICIAL RECEIPT: ${currentOrderData.inv}<br><span class="text-[9px] opacity-70">${dateStr} | ${timeStr}</span>`;
        modal.querySelector('.space-y-3.mb-6').innerHTML = html;
        
        const formatted = "Rs. " + totalAmount.toLocaleString(undefined, {minimumFractionDigits: 2});
        modal.querySelector('.bg-slate-50 div:first-child span:last-child').innerText = formatted;
        modal.querySelector('.text-lg.font-black span:last-child').innerText = formatted;

        modal.style.display = "flex";
    } else {
        modal.style.display = "none";
    }
}

function printAndSave() {
    const btn = document.getElementById("printBtn");
    btn.disabled = true; // Prevent double-clicking
    btn.innerText = "Processing...";

    const form = new FormData();
    form.append("inv", currentOrderData.inv);
    form.append("date", currentOrderData.date);
    form.append("time", currentOrderData.time);
    form.append("subtotal", currentOrderData.subtotal);
    form.append("total", currentOrderData.total);
    form.append("cartData", currentOrderData.cartData);

    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            if (request.responseText.trim() == "success") {
                window.print(); // Open print dialog
                location.reload(); // Refresh to clear cart and update stock view
            } else {
                alert("Order Save Failed: " + request.responseText);
                btn.disabled = false;
                btn.innerText = "Print Receipt";
            }
        }
    };
    request.open("POST", "saveInvoiceProcess.php", true);
    request.send(form);
}

function deleteCategory(id) {
    if (confirm("Are you sure you want to delete this category? All products linked to it might be affected.")) {
        var form = new FormData();
        form.append("cid", id);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText.trim();
                if (response == "success") {
                    alert("Category deleted successfully!");
                    location.reload(); // Refresh to update the list
                } else {
                    alert("Error: " + response);
                }
            }
        };

        request.open("POST", "deleteCategoryProcess.php", true);
        request.send(form);
    }
}

function loadAllInvoiceDetails() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            document.getElementById("itb").innerHTML = response;

            // Update Total Invoices
            var countVal = document.getElementById("invoice_count_hidden").value;
            document.getElementById("total_invoices_count").innerText = countVal;

            // Update Revenue (Optional: ensure you have an ID 'total_revenue_display' in your HTML)
            var revenueVal = document.getElementById("revenue_total_hidden").value;
            var revElement = document.getElementById("total_revenue_display");
            if(revElement) revElement.innerText = revenueVal;
        }
    };

    request.open("POST", "loadInvoiceDetailsProcess.php", true);
    request.send();
}

// Function to handle Editing
function editProduct(id) {
    // Redirect to the edit page with the product ID in the URL
    window.location.href = "updateProduct.php?id=" + id;
}

function updateProduct() {
    var id = new URLSearchParams(window.location.search).get("id"); // Get ID from URL
    var name = document.getElementById("n").value;
    var cost = document.getElementById("cp").value;
    var sell = document.getElementById("sp").value;
    var qty = document.getElementById("qty").value;
    var status = document.getElementById("st").value;
    var image = document.getElementById("img").files[0];

    var f = new FormData();
    f.append("id", id);
    f.append("n", name);
    f.append("c", cost);
    f.append("s", sell);
    f.append("q", qty);
    f.append("st", status);
    if(image) f.append("i", image);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if(r.readyState == 4 && r.status == 200) {
            if(r.responseText == "success") {
                alert("Product updated successfully!");
                window.location.href = "productManagement.php";
            } else {
                alert(r.responseText);
            }
        }
    };
    r.open("POST", "updateProductProcess.php", true);
    r.send(f);
}

// Live Image Preview
function changeImage() {
    var file = document.getElementById("img").files[0];
    var url = URL.createObjectURL(file);
    document.getElementById("prev").src = url;
}

// Function to handle Deletion
function deleteProduct(id) {
    if (confirm("Are you sure you want to delete this product? This action cannot be undone.")) {
        var form = new FormData();
        form.append("id", id);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText;
                if (response == "success") {
                    alert("Product deleted successfully.");
                    loadAllProducts(); // Reload the table to show updated list
                } else {
                    alert(response);
                }
            }
        };

        request.open("POST", "deleteProductProcess.php", true);
        request.send(form);
    }
}