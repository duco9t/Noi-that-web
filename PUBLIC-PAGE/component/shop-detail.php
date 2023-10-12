<?php
$link = new mysqli("localhost", "root", "", "shopping_online");

$sqlIdArray = "SELECT id FROM categories";
$resultIdArray = $link->query($sqlIdArray);
$category_ids = array();

if ($resultIdArray->num_rows > 0) {
    while ($row = $resultIdArray->fetch_assoc()) {
        $category_ids[] = $row["id"];
    }
} else {
    echo "Không có dữ liệu trong bảng categories";
}

// Check if categoryId is set in the URL
if (isset($_GET['categoryId'])) {
    $category_id = $_GET['categoryId'];
} else {
    $category_id = $category_ids[0];
}

$sqlProducts = "SELECT id, product_name, image, price FROM products WHERE category_id = $category_id";
$resultProducts = $link->query($sqlProducts);
?>
<div class="shop-detail">
    <div class="product-section">
        <div style="width: 25%; margin-top: 50px;" class="categories-column">
            <ul style="list-style: none; padding-right: 40px; padding-left: 0px;">
                <?php
                foreach ($category_ids as $cat_id) {
                    $sqlCategories = "SELECT id, category_name FROM categories WHERE id = $cat_id";
                    $resultCategories = $link->query($sqlCategories);

                    if ($resultCategories->num_rows > 0) {
                        $row = $resultCategories->fetch_assoc();
                        ?>
                        <li style="margin-bottom: 30px;">
                            <a style="color: black; text-decoration: none; text-transform: uppercase;
                            font-size: 18px; font-weight: 600; color: #3b5d50" href="index.php?pid=9&categoryId=<?php echo $row["id"]; ?>">
                                <?php echo $row["category_name"]; ?>
                            </a>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>

        <div style="width: 75%; margin-top: 50px;" class="products-column">
            <?php
            include "shop-section.php";
            ?>
        </div>
    </div>
</div>

<style>
    .products-column {
        display: flex;
        justify-content: center;
    }

    .products-column div {
        width: 100%;
    }

    .shop-detail {
        display: flex;
        justify-content: center;
    }

    .btn {
        font-weight: 600;
        padding: 16px 34px;
        border-radius: 30px;
        color: #eff2f1;
        ;
        background: #2f2f2f;
        border-color: #2f2f2f;
        text-decoration: none;
    }

    .btn:hover {
        color: #ffffff;
        background: #222222;
        border-color: #222222;
    }

    .section-title {
        color: #2f2f2f;
        font-size: 34px;
        font-weight: 500;
    }

    .section-decrition {
        color: #2f2f2f;
        font-size: 14px;
        opacity: 0.7;
        line-height: 2.0;
        margin-bottom: 50px;
    }

    .product-section {
        width: 68%;
        display: flex;
        justify-content: center;
        align-items: start;
        height: auto;
        margin-bottom: 80px;
    }


    .row {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 50px;
    }

    .row div {
        width: 33%;
    }

    .product-item {
        text-align: center;
        text-decoration: none;
        display: block;
        position: relative;
        padding-bottom: 50px;
        cursor: pointer;
    }

    .product-thumbnail {
        margin-bottom: 30px;
        position: relative;
        width: 90%;
        -webkit-transition: .3s all ease;
        -o-transition: .3s all ease;
        transition: .3s all ease;
    }

    .product-item h3 {
        font-weight: 600;
        font-size: 16px;
    }

    .product-item strong {
        font-weight: 800 !important;
        font-size: 18px !important;
    }

    .product-item h3,
    .product-item strong {
        color: #2f2f2f;
        text-decoration: none;
    }

    .icon-cross {
        position: absolute;
        width: 35px;
        height: 35px;
        display: inline-block;
        background: #2f2f2f;
        bottom: 15px;
        left: 50%;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);
        margin-bottom: -17.5px;
        border-radius: 50%;
        opacity: 0;
        visibility: hidden;
        -webkit-transition: .3s all ease;
        -o-transition: .3s all ease;
        transition: .3s all ease;
    }

    .icon-cross img {
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .product-item:before {
        bottom: 0;
        left: 0;
        right: 0;
        position: absolute;
        content: "";
        background: #dce5e4;
        height: 0%;
        z-index: -1;
        border-radius: 10px;
        -webkit-transition: .3s all ease;
        -o-transition: .3s all ease;
        transition: .3s all ease;
    }

    .product-thumbnail {
        top: -25px;
    }

    .product-item:hover .icon-cross {
        bottom: 0;
        opacity: 1;
        visibility: visible;
    }

    .product-item:hover:before {
        height: 70%;
    }

    @media (max-width: 400px) {
        .row {
            width: 100%;
            flex-direction: column;
            margin: 10px;
        }

        .row div {
            width: 100%;
            height: 550px;
        }

        .row div:nth-child(1) {
            height: 400px;
        }

        .product-section {
            height: auto;
        }
    }

    @media (max-width: 768px) {
        .row {
            width: 100%;
            flex-direction: column;
            margin: 10px;
        }

        .row div {
            width: 100%;
            height: 550px;
        }

        .row div:nth-child(1) {
            height: 400px;
        }

        .product-section {
            height: auto;
        }
    }
</style>