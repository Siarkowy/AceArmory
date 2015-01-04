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
            <ul class="itemlist">
<?php for ($slot = 0; $slot < 20; $slot++): $item = @$char->inventory[$slot] ?>
                <li>
                    <?= isset($item) ? $item : '&nbsp;' ?>
                </li>
<?php endfor ?>
<?php if ($char2) for ($slot = 0; $slot < 20; $slot++): $item = @$char->inventory[$slot]; $item2 = @$char2->inventory[$slot] ?>
                <li<?= ($item && $item2 && $item->id != $item2->id) ? ' class="' . ($item->itemlevel < $item2->itemlevel ? 'better' : 'worse') . '"' : '' ?>>
                    <?= isset($item2) ? $item2 : '&nbsp;' ?>
                </li>
<?php endfor ?>
            </ul>
            <p><a href="?" class="btn btn-default">Back to list</a></p>
