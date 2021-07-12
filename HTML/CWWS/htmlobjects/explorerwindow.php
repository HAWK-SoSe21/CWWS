<div id="explorer" class="explorer">
    
    
    <div class="mainbox" id="searchbox">
        <h3>Artikelsuche:</h3>
        <br>

        <form action="index.php" method="post">
            <input type="text" name="suchbegriff" placeholder="Suchbegriff...">
            <input type="submit" name="suchen" value="suchen">
        </form>
        
        <?php
           include_once ROOT.'/PHP/search.inc.php'; 
        ?>

        <?php if(isset($searchresults)):?>
            <?php foreach($searchresults as $key => $searchresult):?>
                <li><a href="?searchid=<?=str_pad($searchresult->Properties_id, 4, 0, STR_PAD_LEFT)?>"><?= $searchresult->Properties_name ?></a></li>
            <?php endforeach?>
        <?php else: ?>
            <p>keine Suchergebnisse</p>
        <?php endif?>

        

    </div>



    <div class="mainbox">
        <h3>Räume:</h3>

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
        <h3>Möbel:</h3>

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

                <li ><span class="tab1"></span><a href="?substoragefixedid=<?=str_pad($Substorage->Substorage_fixed_id, 4, 0, STR_PAD_LEFT)?>"><?= $Substorage->Substorage_fixed_name?></a></li>

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

                <li ><span class="tab1"></span><a href="?substoragemobileid=<?=str_pad($Substorage->Substorage_mobile_id, 4, 0, STR_PAD_LEFT)?>"><?= $Substorage->Substorage_mobile_name?></a></li>

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

                <li><span class="tab3"></span><a href="?articleid=<?=str_pad($article->Articel_id, 4, 0, STR_PAD_LEFT)?>"><?= $article->articel_name?></a></li>

            <?php endforeach;?>

        <?php endif;?>

    </div>

    <div class="mainbox">

        <h3>Artikelgruppen:</h3>  

        <?php $articlegroups = getarticlegroups();?>

        <?php if(!$articlegroups):?>
            <br>
            <p>keine Gruppen gefunden!</p>

        <?php else:?>
            <br>
            <?php foreach ($articlegroups as $articlegroup): ?>

                <li><span></span><a href="?articlegroupid=<?=str_pad($articlegroup->Articel_group_id, 4, 0, STR_PAD_LEFT)?>"><?= $articlegroup->Articel_group_name?></a></li>

            <?php endforeach;?>

        <?php endif;?>

    </div>

</div>
