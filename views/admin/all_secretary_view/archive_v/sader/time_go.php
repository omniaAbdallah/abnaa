<div class="panel-body">
                                        <table class="table minutes-table">
                                            <tbody>
                                            <tr>
                                                <?php
                                          
                                                $then = $get_all->date_ar;
                                                $now = $get_all->suspend_date_ar;
                                               
                                            
                                                if($then> $now || $then== $now)
                                                {
                                               $then = new DateTime($then);
                                               $now = new DateTime($now);
                                                $sinceThen = $then->diff($now);
                                                }else{
                                                    $then = new DateTime('');
                                                    $now = new DateTime('');
                                                    $sinceThen = $then->diff($now);
                                                }
                                                ?>
                                                <td><?= $sinceThen->i ?></td>
                                                <td><?= $sinceThen->h ?></td>
                                                <td><?= $sinceThen->d ?></td>
                                                <td><?= $sinceThen->m ?></td>
                                                <td><?= $sinceThen->y ?></td>
                                            </tr>
                                            <tr>
                                                <td>دقيقة</td>
                                                <td>ساعة</td>
                                                <td>يوم</td>
                                                <td>شهر</td>
                                                <td>سنه</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>