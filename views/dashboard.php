<?php // AceArmory (c) 2015 by Siarkowy. All rights reserved. See LICENSE for licensing info. ?>
            <form method="get" action="?">
                <ul class="filelist">
<?php foreach ($sheetlist as $file): $name = str_replace('.xml', '', $file); preg_match('~<talentSpec .*? icon="(.*?)"~', file_get_contents(SHEETS_DIR_PATH . $file), $icon); ?>
                    <li><input type="checkbox" name="sheet[]" value="<?= $name ?>"> <a href="?action=show&amp;sheet=<?= urlencode($name) ?>"><?= new Icon($icon[1]) ?> <?= str_replace('.xml', '', $file) ?></a></li>
<?php endforeach ?>
                </ul>

                <p class="pull-right">
                    <button type="submit" name="action" value="compare" class="btn btn-primary"><i class="glyphicon glyphicon-random"></i> Compare</button>
                    <button type="reset" class="btn btn-primary" onclick='$(":checkbox").attr("checked", false); return false'>Uncheck all</button>
                    <button type="submit" name="action" value="delete" class="btn btn-danger" onclick="return confirm('Do you really want to delete selected characters?')">Delete</button>
                </p>
            </form>

            <form action="?" method="post" id="loadsheet" class="form-inline">
                <div class="form-group">
                    <label class="sr-only">New character</label>
                    <input type="text" class="form-control" name="newsheet" placeholder="Character name">
                </div>

                <button type="submit" name="action" value="download" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> Download</button>
            </form>
