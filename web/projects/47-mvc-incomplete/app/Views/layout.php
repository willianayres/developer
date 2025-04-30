<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8" />
        <meta name="author" content="<?php echo $this->getAuthor();?>" />
        <meta name="description" content="<?php echo $this->getDescription();?>" />
        <meta name="keywords" content="<?php echo $this->getKeywords();?>" />
        <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=10, minimum-scale=1.0" />
        <link rel="icon" href="<?php echo DIRPAGE;?>favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="<?php echo DIRCSS;?>style.css" />
        <?php echo $this->addHead();?>
        <title><?php echo $this->getTitle();?></title>
    </head>

    <body>

<?php echo $this->addHeader();?>
        
<?php echo $this->addMain();?>

<?php echo $this->addFooter();?>

    </body>

</html>