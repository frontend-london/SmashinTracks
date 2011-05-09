                <div class="box-silver" id="box-edycjatekstow">
                    <div class="bs-inner">
                        <img src="images/texts/edycja-tekstow.gif" alt="Edycja Tekstów" id="be2-img1" />
                        <div id="be2-div1">
                            W tym miejscu mozesz edytowac <span class="blue">komunikaty oraz info texty</span> które towarzyszą kazdej podstronie.
                        </div>
                        <div class="be2-grouptitle">Niezalogowany</div>
                        <table class="be2-group">
                            <tr>
                            	<td>
                                    <strong>1. ST-Home-niezalogowany</strong><br />
                                    <ul>
                                    	<li><span>- welcome text</span>  <a href="<?=url_for('panel_texts_edit', array('texts_name' => 'Home-niezalogowany-welcome-text'))?>" class="track-edit">EDIT</a></li>
                                        <li><span>- recommends 10 smashin tracks</span> <a href="<?=url_for('panel_texts_edit', array('texts_name' => 'Home-niezalogowany-recommends-10-smashin-tracks'))?>" class="track-edit">EDIT</a></li>
                                        <li><span>- new tracks</span> <a href="<?=url_for('panel_texts_edit', array('texts_name' => 'Home-niezalogowany-new-tracks'))?>" class="track-edit">EDIT</a></li>
                                        <li><span>- bestsellers tracks</span> <a href="<?=url_for('panel_texts_edit', array('texts_name' => 'Home-niezalogowany-bestsellers-tracks'))?>" class="track-edit">EDIT</a></li>
                                    </ul>
                                </td>
                                <td>
                                    <strong>2. ST-Charts</strong><br />
                                    <ul>
                                    	<li><span>- main text</span>  <a href="<?=url_for('panel_texts_edit', array('texts_name' => 'Charts-main-text'))?>" class="track-edit">EDIT</a></li>
                                    </ul>
                                </td>
                            </tr>
                        	<tr>
                            	<td>
                                    <strong>3. ST-FAQ</strong><br />
                                    <ul>
                                    	<li><span>- main text</span>  <a href="<?=url_for('panel_texts_edit', array('texts_name' => 'FAQ-main-text'))?>" class="track-edit">EDIT</a></li>
                                    	<li><span>- Treść</span>  <a href="#" class="track-edit">EDIT</a></li>
                                    </ul>
                                </td>
                                <td>
                                    <strong>4. ST-Genre-list</strong><br />
                                    <ul>
                                    	<li><span>- main text</span>  <a href="<?=url_for('panel_texts_edit', array('texts_name' => 'Genre-list-main-text'))?>" class="track-edit">EDIT</a></li>
                                    </ul>
                                </td>
                            </tr>
                        	<tr>
                            	<td>
                                    <strong>5. ST-New-tracks</strong><br />
                                    <ul>
                                    	<li><span>- main text</span>  <a href="<?=url_for('panel_texts_edit', array('texts_name' => 'New-tracks-main-text'))?>" class="track-edit">EDIT</a></li>
                                    </ul>
                                </td>
                                <td>
                                    <strong>6. ST-Terms &amp; Condition</strong><br />
                                    <ul>
                                    	<li><span>- main text</span>  <a href="<?=url_for('panel_texts_edit', array('texts_name' => 'Terms-main-text'))?>" class="track-edit">EDIT</a></li>
                                    </ul>
                                </td>
                            </tr>
                        	<tr>
                            	<td>
                                    <strong>7. ST-Search</strong><br />
                                    <ul>
                                    	<li><span>- main text</span>  <a href="<?=url_for('panel_texts_edit', array('texts_name' => 'Search-main-text'))?>" class="track-edit">EDIT</a></li>
                                    	<li><span>- No Results</span>  <a href="<?=url_for('panel_texts_edit', array('texts_name' => 'Search-No-Results'))?>" class="track-edit">EDIT</a></li>
                                    </ul>
                                </td>
                                <td>
                                    <strong>8. ST-Artists</strong><br />
                                    <ul>
                                    	<li><span>- main text</span>  <a href="<?=url_for('panel_texts_edit', array('texts_name' => 'Artists-main-text'))?>" class="track-edit">EDIT</a></li>
                                    </ul>
                                </td>
                            </tr>
                        	<tr>
                            	<td>
                                    <strong>9. ST-Koszyk</strong><br />
                                    <ul>
                                    	<li><span>- main text</span>  <a href="<?=url_for('panel_texts_edit', array('texts_name' => 'Koszyk-main-text'))?>" class="track-edit">EDIT</a></li>
                                    </ul>
                                </td>
                                <td>
                                    <strong>10. ST-Koszyk-Order Complete</strong><br />
                                    <ul>
                                    	<li><span>- main text</span>  <a href="<?=url_for('panel_texts_edit', array('texts_name' => 'Koszyk-main-text'))?>" class="track-edit">EDIT</a></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                            	<td>
                                    <strong>11. ST-Koszyk-download</strong><br />
                                    <ul>
                                    	<li><span>- main text</span>  <a href="<?=url_for('panel_texts_edit', array('texts_name' => 'Koszyk-download-main-text'))?>" class="track-edit">EDIT</a></li>
                                    </ul>
                                </td>
                                <td>
                                </td>
                            </tr>
                        </table>
                        <div class="be2-grouptitle">Zalogowany</div>
                        <table class="be2-group">
                        	<tr>
                            	<td>
                                    <strong>1. ST-ZALOGOWANY-Home</strong><br />
                                    <ul>
                                        <li><span>- welcome text</span>  <a href="<?=url_for('panel_texts_edit', array('texts_name' => 'ZALOGOWANY-Home-welcome-text'))?>" class="track-edit">EDIT</a></li>
                                        <li><span>- Twoich trackow...</span>  <a href="<?=url_for('panel_texts_edit', array('texts_name' => 'ZALOGOWANY-Home-welcome-text'))?>" class="track-edit">EDIT</a></li>
                                        <li><span>- twoich trackow w ‘wish...’</span>  <a href="<?=url_for('panel_texts_edit', array('texts_name' => 'ZALOGOWANY-Home-twoich-trackow-w-wishlist'))?>" class="track-edit">EDIT</a></li>
                                        <li><span>- twoja ‘wishlist’ zawiera...</span>  <a href="<?=url_for('panel_texts_edit', array('texts_name' => 'ZALOGOWANY-Home-twoja-wishlist-zawiera'))?>" class="track-edit">EDIT</a></li>
                                        <li><span>&nbsp;</span></li>
                                        <li><span>- upload track</span>  <a href="<?=url_for('panel_texts_edit', array('texts_name' => 'ZALOGOWANY-Home-upload-track'))?>" class="track-edit">EDIT</a></li>
                                        <li><span>- my tracks</span>  <a href="<?=url_for('panel_texts_edit', array('texts_name' => 'ZALOGOWANY-Home-my-tracks'))?>" class="track-edit">EDIT</a></li>
                                        <li><span>- my downloads</span>  <a href="<?=url_for('panel_texts_edit', array('texts_name' => 'ZALOGOWANY-Home-my-downloads'))?>" class="track-edit">EDIT</a></li>
                                        <li><span>- my wishlist</span>  <a href="<?=url_for('panel_texts_edit', array('texts_name' => 'ZALOGOWANY-Home-my-wishlist'))?>" class="track-edit">EDIT</a></li>
                                        <li><span>- my profile</span>  <a href="<?=url_for('panel_texts_edit', array('texts_name' => 'ZALOGOWANY-Home-my-profile'))?>" class="track-edit">EDIT</a></li>
                                    </ul>
                                </td>
                                <td>
                                    <strong>2. ST-ZALOGOWANY-My sales</strong><br />
                                    <ul>
                                    	<li><span>- main text</span>  <a href="<?=url_for('panel_texts_edit', array('texts_name' => 'ZALOGOWANY-My-sales-main-text'))?>" class="track-edit">EDIT</a></li>
                                    	<li><span>- Minimalna kwota wyplaty...</span>  <a href="<?=url_for('panel_texts_edit', array('texts_name' => 'ZALOGOWANY-My-sales-Minimalna-kwota-wyplaty'))?>" class="track-edit">EDIT</a></li>
                                    </ul>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>