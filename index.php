<?php
require_once "Mainproduct.php";
$data = new productType();
$all = $data->fetchAll();

include_once "header.php";
?>

<div class="container">
    <div class="pt-3 mt-4">
        <nav class="nav">
            <h2 class="nav__left">Product List</h2>
            <div class="nav__right">
                <input class="nav__right-button btn btn-outline-primary" id="secondaryAdd" type="button" value="ADD">
                <input class="nav__right-button btn btn-outline-danger active" type="button" id="delete-product-btn"  value="Mass Delete"/>
            </div>
        </nav>
    </div>
    <hr>
</div>
<div class="container">
    <main class="main">
        <form action="delete.php" method="POST">
                    <input type="submit" name="add" id="primaryAdd" hidden>
                    <input type="submit" name="delete" id="primaryDelete" hidden>

            <div class="row">
                            <?php
foreach ($all as $key => $val) {
    ?>

      <div class='col-md-3 col-sm-6 mb-3 mt-3'>
    <div class='card border border-dark rounded'>
        <div class='card-body'>
            <input type='checkbox' class='delete-checkbox' name='checkbox[]' value=" <?=$val['id']?>">
            <p class='card-text'><?=$val['sku']?></p>
            <p><?=$val['n_ame']?></p>
            <p><?=$val['price']?> $ </p>

        <?php
if ($val['size'] !== "") {
        ?>
        <p> Size: <?=$val['size']?> MB </p>
        <?php
} elseif ($val['w_eight'] !== "") {
        ?>
        <p> Weight: <?=$val['w_eight']?> KG </p>
        <?php
} elseif ($val['dimension'] !== "") {
        ?>
        <p> Dimension: <?=$val['dimension']?></p>
    <?php } else {?>
        <p>No Specific Type</p>
        <?php }?>
    </div></div>
    </div>
    <?php }?>
</form>

</main>
</div>

<?php
include_once "footer.php";
?>

<script>

$('#secondaryAdd').click(function(){
    $("#primaryAdd").click();
})

$('#delete-product-btn').click(function(){
    $("#primaryDelete").click();
})

</script>

</body>
</html>
