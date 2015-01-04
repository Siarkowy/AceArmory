<?php // AceArmory (c) 2015 by Siarkowy. All rights reserved. See LICENSE for licensing info. ?>
            <h2>New sheet</h2>
            <form action="?" method="post" id="loadsheet" class="form-inline">
                <div class="form-group">
                    <label class="sr-only">Character name</label>
                    <input type="text" name="newsheet" placeholder="Character name">
                </div>

                <button type="submit" class="btn btn-primary">Load</button>
            </form>

            <h2>Saved characters</h2>
            <form method="get" action="?">
                <ul class="filelist">
<?php foreach ($sheetlist as $file): $name = str_replace('.xml', '', $file); preg_match('~<talentSpec .*? icon="(.*?)"~', file_get_contents(SHEETS_DIR_PATH . $file), $icon); ?>
                    <li><input type="checkbox" name="sheet[]" value="<?= $name ?>"> <a href="?sheet=<?= urlencode($name) ?>"><?= new Icon($icon[1]) ?> <?= str_replace('.xml', '', $file) ?></a></li>
<?php endforeach ?>
                </ul>

                <p>
                    <button type="submit" class="btn btn-primary">Compare</button>
                    <button class="btn btn-default" onclick='$(":checkbox").attr("checked", false); return false'>Uncheck all</button>
                </p>
            </form>
