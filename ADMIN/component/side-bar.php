<?php
// Hàm trả về đường dẫn ảnh cho menu
function getMenuImage($pid)
{
    $menuImages = array(
        1 => 'category.svg',
        2 => 'product.svg',
        3 => 'brand.svg',
        4 => 'member.svg',
        5 => 'customer.svg',
        6 => 'order.svg',
        7 => 'revenue.svg',
    );
    return $menuImages[$pid];
}

// Hàm trả về văn bản cho menu
function getMenuText($pid)
{
    $menuTexts = array(
        1 => 'Category',
        2 => 'Product',
        3 => 'Brand',
        4 => 'Member',
        5 => 'Customer',
        6 => 'Order',
        7 => 'Revenue',
    );
    return $menuTexts[$pid];
}
?>
<?php
$current_page = isset($_GET['pid']) ? $_GET['pid'] : 0;

$page_colors = array(
    1 => '#F0F7FF',
    2 => '#F0F7FF',
    3 => '#F0F7FF',
    4 => '#F0F7FF',
    5 => '#F0F7FF',
    6 => '#F0F7FF',
    7 => '#F0F7FF',
);

$background_color = array_key_exists($current_page, $page_colors) ? $page_colors[$current_page] : '#F0F7FF';
?>

<div id="side-bar">
    <div class="logo-brand" onclick="toggleSidebar()">
        <div class="logo">
            <a href="#">
                <img src="../PUBLIC-PAGE/images/logo-black.svg" alt="">
            </a>
        </div>
        <a id="brand-letter" style="opacity: 0.8;">Nova<span>.</span></a>
    </div>
    <div class="menu-bar">
        <?php for ($i = 1; $i <= 7; $i++) : ?>
            <div onclick="window.location.href='index.php?pid=<?php echo $i; ?>';" style="background-color: <?php echo ($current_page == $i) ? $background_color : 'transparent'; ?>" class="menu-link">
                <a href="index.php?pid=<?php echo $i; ?>" class="menu-content">
                    <img src="../PUBLIC-PAGE/images/<?php echo getMenuImage($i); ?>" alt="" class="image-menu">
                    <span class="text-menu"><?php echo getMenuText($i); ?></span>
                </a>
            </div>
        <?php endfor; ?>

        <div onclick="window.location.href='index.php';" style="background-color: <?php echo ($current_page === 0) ? $background_color : 'transparent'; ?>" class="menu-link">
            <a href="index.php" class="menu-content">
                <img src="../PUBLIC-PAGE/images/logo-black.svg" alt="" class="image-menu">
                <span class="text-menu">Nova.</span>
            </a>
        </div>
    </div>

</div>

<script>
    function toggleSidebar() {
        var sideBar = document.getElementById("side-bar");
        var brandLetter = document.getElementById("brand-letter");
        var textMenus = document.querySelectorAll(".text-menu");
        var imgElements = document.querySelectorAll(".image-menu");

        if (sideBar.style.width === "15%") {
            sideBar.style.width = "5%";
            brandLetter.style.display = "none";

            textMenus.forEach(function(element) {
                element.style.display = "none";
            });

            imgElements.forEach(function(element) {
                element.style.marginRight = "0";
            });
        } else {
            sideBar.style.width = "15%";
            brandLetter.style.display = "block";

            textMenus.forEach(function(element) {
                element.style.display = "block";
            });

            imgElements.forEach(function(element) {
                element.style.marginRight = "0px";
            });
        }
    }
</script>

<style>
    #side-bar {
        width: 15%;
        border-right: 1px solid transparent;
        box-shadow: 0 0 3px 0px rgba(0, 0, 0, 0.3);
        overflow: hidden;
    }

    .menu-bar {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
    }

    .menu-bar div {
        font-size: 16px;
        font-weight: bold;
        width: 70%;
        margin: 5px 0;
        padding: 10px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .menu-bar div a {
        display: flex;
        align-items: center;
    }

    .menu-bar div:hover {
        background-color: #F0F7FF;
    }

    .menu-bar div a {
        text-decoration: none;
        color: #3b5d50;
        font-size: 18px;
        margin-left: 10px;
    }

    .menu-bar div a img {
        width: 30px;
        height: 30px;
        margin-right: 20px;
    }

    .logo-brand {
        height: 7%;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .logo-brand img {
        width: 50px;
    }

    .logo-brand a {
        text-decoration: none;
        color: #000000;
        font-size: 28px;
        font-weight: bold;
        margin-left: 10px;
    }
</style>