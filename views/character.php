<?php // AceArmory (c) 2015 by Siarkowy. All rights reserved. See LICENSE for licensing info. ?>
            <table class="table">
                <tr>
                    <th>General Info</th>
                    <td>Level <?= $char->level ?> <?= $char->race ?> <?= $char->class ?></td>
                </tr>

                <tr>
                    <th>Specialization</th>
                    <td><?= $char->spec ?></td>
                </tr>

                <tr>
                    <th>Professions</th>
                    <td>
                        <ul>
<?php foreach ($char->profs as $prof): ?>
                            <li><?= $prof ?></li>
<?php endforeach // profs ?>
                        </ul>
                    </td>
                </tr>

                <tr>
                    <th>Additional</th>
                    <td>
                        <a href="<?= $char->url ?>"><?= ARMORY_REALM ?> Armory</a>
                    </td>
                </tr>
            </table>

            <h2>Inventory</h2>
            <div class="row">
                <div class="col-sm-<?= $char2 ? 6 : 12 ?>">
                    <ul class="list-group itemlist<?= $char2 ? '' : ' cols2' ?>">
<?php if ($char2): ?>
                        <li class="list-group-item active char-header"><?= $char->name ?></li>
<?php endif ?>
<?php for ($slot = 0; $slot < $maxslot; $slot++): $item = @$char->inventory[$slot] ?>
                        <li class="list-group-item">
                            <?= isset($item) ? $item : '&nbsp;' ?>
                        </li>
<?php endfor ?>
                    </ul>
                </div>
<?php if ($char2): ?>

                <div class="col-sm-6">
                    <ul class="list-group itemlist">
                        <li class="list-group-item active char-header"><?= $char2->name ?></li>
<?php for ($slot = 0; $slot < $maxslot; $slot++): $item = @$char->inventory[$slot]; $item2 = @$char2->inventory[$slot] ?>
                            <li<?= ($item && $item2 && $item->id != $item2->id) ? ' class="list-group-item ' . ($item->itemlevel < $item2->itemlevel ? 'better' : 'worse') . '"' : ' class="list-group-item"' ?>>
                                <?= isset($item2) ? $item2 : '&nbsp;' ?>
                        </li>
<?php endfor ?>
                    </ul>
                </div>
<?php endif // char 2 ?>
            </div>

            <p><a href="?" class="btn btn-default">Back to list</a></p>
