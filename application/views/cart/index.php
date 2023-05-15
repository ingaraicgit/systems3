

<script type="text/javascript"src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>

<h2>My Cart</h2>

<script>

function updateCartItem(obj, rowid){
    $.get("<?php echo base_url('cart/updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
        if(resp == 'ok'){
            location.reload();
        }else{
            location.reload();
        }
    });
}

</script>

<table class="table table-striped">
<thead>
    <tr>
    	<th width="10%"></th>
        <th width="30%">Product</th>
        <th width="15%">Price</th>
        <th width="13%">Quantity</th>
        <th width="20%" class="text-right">Subtotal</th>
        <th width="12%"></th>
    </tr>
</thead>
<tbody>
    <?php if($this->cart->total_items() > 0){ foreach($order_items as $item){    ?>
    <tr>
    	<td></td>
        <td><?php echo $item["name"]; ?></td>
        <td><?php echo '$'.$item["price"].' €'; ?></td>
        <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
        <td class="text-right"><?php echo '$'.$item["subtotal"].' €'; ?></td>
        <td class="text-right"><input class="btn btn-sm btn-danger" type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete the item?')?window.location.href='<?php echo base_url('cart/removeItem/'.$item["rowid"]); ?>':false;"></input> 
        </td>
    </tr>
    <?php } }else{ ?>
    <tr><td colspan="6"><p>Your cart is empty.....</p></td>
    <?php } ?>
    <?php if($this->cart->total_items() > 0){ ?>
    <tr>
     
        <td></td>
        <td></td>
        <td><strong>Cart Total</strong></td>
        <td></td>
        <td class="text-right"><strong><?php echo '$'.$this->cart->total().' €'; ?></strong></td>
        <td></td>
    </tr>
    <?php } ?>
</tbody>
</table>

<div class="row">
    <div class="col-md-2">
        <a class="btn btn-default"  href="<?php echo base_url('posts'); ?>">Continue shopping</a>
    </div>
    <div class="col-md-8"></div>
    <div class="col-md-2">
        <a type="submit" class="btn btn-success" href="#">Continue to checkout</a>  
    </div>
</div>

