<?php
include_once '../config/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" http-equiv="Content-Type">
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" type="image/x-icon" href="icon.ico">
    <title> <? echo $config['title']; ?> </title>
</head>
<body>
<div id="wrapper">

    <? include 'header.php'; ?>

    <div class="container">
        <div class="left">
            <div class="block-left">
                <div>
                    <h3>Latest published</h3>
                </div>
                <div class="block-contant">
                    <div class="block-articles">

                        <?php
                        //запрос в БД к таблице articles
                        $articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id`");
                        ?>

                        <?php
                        //цикл будет выводить все данные из таблицы articles
                        while($art = mysqli_fetch_assoc($articles))
                        {
                            ?>

                            <div class="article">
                                <!-- стиль указан как в css, путь к папке с картинками, а название картинки берем из БД -->
                                <div class="article-image" style="background-image: url(../images/<?php echo $art['image']; ?>);"></div>
                                <div class="article-info">
                                    <div class="article-title">
                                        <!--заголовок статьи делаем ссылкой, в GET запросе(?id=) передается id номер этой статьи из БД,
                                        таким образом в файле article.php откроется указанная статья-->
                                        <a href="article.php?id= <? echo $art['id']; ?>">
                                            <? echo $art['title']; ?>
                                        </a>
                                    </div>
                                    <?php
                                    //$categories берем из header и если id номер категории совпадает с номером категории из таблицы articles, то значение присваивается в переменную и прекращается работа цикла
                                    $art_cat = false;
                                    foreach($categories as $value)
                                    {
                                        if($value['id'] == $art['categorie_id']){
                                            $art_cat = $value;
                                            break;
                                        }
                                    }
                                    ?>
                                    <div class="article-categorie">
                                        Category:
                                        <a href="categories.php?id= <? echo $art_cat['id']; ?>">
                                            <? echo $art_cat['categorie']; ?>
                                        </a>
                                    </div>
                                    <!-- функция обрезает необходимое количество символов текста -->
                                    <div class="article-text"> <? echo mb_substr($art['text'], 0, 295, 'utf-8') . '...'; ?> </div>
                                </div>
                            </div>

                            <?php
                            //закрываем цикл while
                        }
                        ?>

                    </div>
                </div>
            </div>

        </div>

        <? include 'sidebar.php'; ?>

        <div class="clear"></div>
    </div>

    <? include_once 'footer.php'; ?>

</div>

</body>
</html>

























