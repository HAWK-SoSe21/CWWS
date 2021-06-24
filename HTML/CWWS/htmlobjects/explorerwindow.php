<div id="explorer" class="explorer">
    

    <div class="mainbox">
        <h3>Lagerplätze:</h3>

        <?php $Storages = getstorages();?>
    
        <?php if(!$Storages):?>
            <br>
            <p>keine Lagerplätze gefunden</p>

        <?php  else:?>
            <br>
            <?php foreach ($Storages as $Storag): ?>
                
                <li><a href="?storageid=<?=str_pad($Storag->Storage_id, 4, 0, STR_PAD_LEFT)?>"><?= $Storag->Storage_name ?></a></li>
                
            <?php endforeach;?>
            
        <?php endif;?>

    </div>


    <div class="mainbox">
        <h3>Sublagerplätze:</h3>
        
        <?php $Substorages = getsubstorages();?>
        
        <?php if(!$Substorages):?>
            <br>
            <p>keine Sublagerplätze gefunden</p>

        <?php else:?>
            <br>
            <?php foreach ($Substorages as $Substorage):?>

                <li ><span class="tab1"></span><a href="?substorageid=<?=str_pad($Substorage->Substorage_id, 4, 0, STR_PAD_LEFT)?>"><?= $Substorage->Substorage_name?></a></li>

            <?php endforeach;?>

        <?php endif;?>

    </div>

    <div class="mainbox">
        <h3>feste Sublagerplätze:</h3>
        
        <?php $Substorages = getfixedsubstorages();?>
        
        <?php if(!$Substorages):?>
            <br>
            <p>keine festen Sublagerplätze gefunden</p>

        <?php else:?>
            <br>
            <?php foreach ($Substorages as $Substorage):?>

                <li ><span class="tab1"></span><a href="?substorageid=<?=str_pad($Substorage->Substorage_id, 4, 0, STR_PAD_LEFT)?>"><?= $Substorage->Substorage_name?></a></li>

            <?php endforeach;?>

        <?php endif;?>

    </div>

    <div class="mainbox">
        <h3>bewegliche Sublagerplätze:</h3>
        
        <?php $Substorages = getmobilesubstorages();?>
        
        <?php if(!$Substorages):?>
            <br>
            <p>keine beweglichen Sublagerplätze gefunden</p>

        <?php else:?>
            <br>
            <?php foreach ($Substorages as $Substorage):?>

                <li ><span class="tab1"></span><a href="?substorageid=<?=str_pad($Substorage->Substorage_id, 4, 0, STR_PAD_LEFT)?>"><?= $Substorage->Substorage_name?></a></li>

            <?php endforeach;?>

        <?php endif;?>

    </div>


    <div class="mainbox">

        <h3>Artikel:</h3>  

        <?php $articles = getarticles();?>

        <?php if(!$articles):?>
            <br>
            <p>keine Artikel gefunden!</p>

        <?php else:?>
            <br>
            <?php foreach ($articles as $article): ?>

                <li><span class="tab3"></span><a href="?articleid=<?=str_pad($article->Articel_id, 4, 0, STR_PAD_LEFT)?>"><?= $article->Articel_name?></a></li>

            <?php endforeach;?>

        <?php endif;?>

    </div>
    
</div>