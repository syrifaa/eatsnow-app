<?php
function generateVoucherCard($title, $desc) {
    $id = str_replace(' ', '', $title);
    $card = <<<EOT
    <div class="voucher">
        <label class="voucher-title">$title</label>
        <label class="voucher-desc">Redeem voucher with $desc points</label>
        <div class="voucher-btn">
            <button id="voucher-edit" onclick="on('$title', '$desc')">Edit</button>
            <button id="voucher-delete">Delete</button>
        </div>
        <div class="voucher-edit" id="voucher-edit-$id">
            <div class="body-text" id="body-text">
                <div class="voucher-container">
                    <label>Voucher Name</label>
                    <input type="text" value="$title" id="edit-title">
                </div>
                <div class="voucher-container">
                    <label>Voucher Description</label>
                    <input type="number" value="$desc" id="edit-desc">
                </div>
            </div>
            <div class="voucher-btn">
                <button id="voucher-save" onclick="saveEdit()">Save</button>
                <button id="voucher-cancel" onclick="off()">Cancel</button>
            </div>
        </div>
    </div>
    EOT;
    return $card;
}
?>