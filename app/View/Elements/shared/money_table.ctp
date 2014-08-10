<?
/**
 * 支払収入の一覧テーブル
 * @params string $titleName
 * @params array  $data        一覧に表示するデータ
 *
 */
?>

<div class="container">
    <div class="row"> 		
        <div class="col-md-offset-1 col-xs-10">
            <div class = "center">
                <h2><?= $titleName?></h2>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">名称</th>
                            <th scope="col">日付</th>
                            <th scope="col">金額</th>
                            <th scope="col">分類</th>
                            <th scope="col">口座名</th>
                            <th scope="col">メモ</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>   
                    </thead>
                    <? foreach ($data as $value) {?>
                        <tbody>
                            <tr>
                                <td><?= h($value[$modelName]['title']);?></td>
                                <td><?= h($value[$modelName]['date']);?></td>
                                <td><?= h($value[$modelName]['amount']);?></td>
                                <td><?= h($value[$modelName . 'Specification']['name']);?></td> 
                                <td><?= h($value['UserAccount']['Account']['name']);?></td>
                                <td><?= h($value[$modelName]['memo']);?></td>
                                <td class="center">
                                    <div class="btn btn-xs btn-success">
                                        <?= $this->Html->link(__('編集'), '/' . $this->name . '/edit/' . $value[$modelName]['id'])?>
                                    </div>
                                </td>
                                <td class="center">   
                                    <div class="btn btn-xs btn-danger">
                                    <?= $this->Html->link(__('削除'), '/' . $this->name . '/delete/' . $value[$modelName]['id'])?>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    <? } ?>
                </table>    
            </div>
        </div>    
    </div>
</div>


