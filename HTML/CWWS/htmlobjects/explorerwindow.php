<!-- Max Recke -->
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
        <?php if(isset($articlesearchresults)&&$articlesearchresults):?>
            <p>Artikel:</p>
            <?php foreach($articlesearchresults as $articlesearchresult):?>
                <li><a href="?articleid=<?=str_pad($articlesearchresult->Articel_id , 4, 0, STR_PAD_LEFT)?>"><?= $articlesearchresult->Articel_name?></a></li>
            <?php endforeach?>
        <?php endif?>
        <?php if(isset($articlegroupsearchresults)&&$articlegroupsearchresults):?>
            <p>Artikelgruppen:</p>
            <?php foreach($articlegroupsearchresults as $articlegroupsearchresult):?>
                <li><a href="?articlegroupid=<?=str_pad($articlegroupsearchresult->Articel_group_id , 4, 0, STR_PAD_LEFT)?>"><?= $articlegroupsearchresult->Articel_group_name ?></a></li>
            <?php endforeach?>
        <?php endif?>
        <p><?php if(isset($searchstatus)){echo $searchstatus;}?></p>
    </div>



    <div class="mainbox">
        <h3>Übersicht:</h3>

        <?php $Storages = getstorages();?>

        <?php if(!$Storages):?>
            <br>
            <p>keine Lagerplätze gefunden</p>

        <?php  else:?>
            <br>
            <?php foreach ($Storages as $Storage): ?>

                <li><a href="?storageid=<?=str_pad($Storage->Storage_id, 4, 0, STR_PAD_LEFT)?>"><?= $Storage->Storage_name ?></a></li>
                <?php $Substorages = getsubstoragesinstorage($Storage);?>
                <?php if(!$Substorages):?>
                    <br>
                    <p>keine Sublagerplätze gefunden</p>
                <?php else:?>
                    
                    <?php foreach ($Substorages as $Substorage):?>

                        <li><span class="tab1"></span><a href="?substorageid=<?=str_pad($Substorage->Substorage_id, 4, 0, STR_PAD_LEFT)?>"><?= $Substorage->Substorage_name?></a></li>
                        <?php $fixedSubstorages = getfixedubstoragesinsubstorage($Substorage);?>

                        <?php if(!$fixedSubstorages):?>
                            <br>
                            <p>keine festen Sublagerplätze gefunden</p>

                        <?php else:?>
                            
                            <?php foreach($fixedSubstorages as $fixedSubstorage):?>

                                <li ><span class="tab2"></span><a href="?substoragefixedid=<?=str_pad($fixedSubstorage->Substorage_fixed_id, 4, 0, STR_PAD_LEFT)?>"><?= $fixedSubstorage->Substorage_fixed_name?></a></li>
                                <?php $mobileSubstorages = getmobilesubstoragesinfixedsubstorage($fixedSubstorage);?>

                                <?php if(!$mobileSubstorages):?>
                                    <br>
                                    <p>keine beweglichen Sublagerplätze gefunden</p>

                                <?php else:?>
                                    
                                    <?php foreach ($mobileSubstorages as $mobileSubstorage):?>

                                        <li ><span class="tab3"></span><a href="?substoragemobileid=<?=str_pad($mobileSubstorage->Substorage_mobile_id, 4, 0, STR_PAD_LEFT)?>"><?= $mobileSubstorage->Substorage_mobile_name?></a></li>
                                        <?php $articles = getarticlesinmobilesubstorage($mobileSubstorage);?>

                                        <?php if(!$articles):?>
                                            <br>
                                            <p>keine Artikel gefunden!</p>

                                        <?php else:?>
                                            
                                            <?php foreach ($articles as $article): ?>

                                                <li><span class="tab4"></span><a href="?articleid=<?=str_pad($article->Articel_id, 4, 0, STR_PAD_LEFT)?>"><?= $article->articel_name?></a></li>
                                                
                            
                                            <?php endforeach;?>

                                        <?php endif;?>
                                    <?php endforeach;?>

                                <?php endif;?>
                            <?php endforeach;?>

                        <?php endif;?>
                    <?php endforeach;?>

                <?php endif;?>

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
