                <div class="box-silver" id="box-mysales">
                    <div class="bs-inner">
                        <img src="images/texts/my-sales.gif" alt="My Sales" id="bm2-img1" />
                        <div class="clear"></div>
                        <div id="bm2-div1">Jesli sprzedajesz tracki na <a href="#" class="underline">Smashintracks.com</a> tutaj mozesz obejrzec jak sie sprzedaja, ile juz zarobiles oraz wyplacic pieniadze.</div>
                        <div id="bm2-div2">
                        	<div id="bm2-div2-left">
                            	<img src="images/texts/your-balance.gif" alt="Your Balance" id="bm2-img2" />
                                <span><?=$profile->getProfilesBalanceText();?></span>
                                <div class="clear"></div>
                            </div>
                        	<div id="bm2-div2-right">
                            	<img src="images/texts/tracks-sold.gif" alt="Track Sold" id="bm2-img3" />
                                <div id="bm2-div4"><?=$profile->getTracksSoldNew();?>  <span id="bm2-span1">l</span> <span id="bm2-span2"><?=$profile->getTracksSoldAll();?></span></div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div id="bm2-div3">
                            <div id="bm2-div3-left">
                                Minimalna kwota wyplaty to <strong>15 pounds</strong>
                            </div>
                            <div id="bm2-div3-right">
                                <div class="button-withdraw">
                                    <div class="button-left"></div>
                                    <div class="button-right"></div>
                                    <a href="#">Withdraw Money</a>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>

                <div class="box-white">
                    <img src="images/texts/transaction-history.gif" alt="Transaction History" />
                    <table id="table-transactions" cellpadding="0" cellspacing="0">
                        <thead>
                            <tr>
	                            <th class="tt-col1">No.</th>  <th class="tt-col2">Date</th>  <th class="tt-col3">Details</th> <th class="tt-col4">Amount</th> <th class="tt-col5">Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                              <td class="tt-col1">78.</td>
                              <td class="tt-col2">18-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Kickin The Beat (Jack Sparrow Project Organ Mix) </a></td>
                              <td class="tt-col4">£0.75      </td>
                              <td class="tt-col5">£9.00   </td>
                            </tr>
                            <tr>
                              <td class="tt-col1">77.</td>
                              <td class="tt-col2">18-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Kickin The Beat (Bassline Mix)</a></td>
                              <td class="tt-col4">£0.75     </td>
                              <td class="tt-col5">£8.25    </td>
                            </tr>
                            <tr>
                              <td class="tt-col1">76.</td>
                              <td class="tt-col2">18-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Garridge Bassline </a></td>
                              <td class="tt-col4">£0.75</td>
                              <td class="tt-col5">£7.50</td>
                            </tr>
                            <tr>
                              <td class="tt-col1">75.</td>
                              <td class="tt-col2">18-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Let It Go (Electroline Mix)</a></td>
                              <td class="tt-col4">£0.75</td>
                              <td class="tt-col5">£6.75</td>
                            </tr>
                            <tr>
                              <td class="tt-col1">74.</td>
                              <td class="tt-col2">18-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Rollercoaster</a></td>
                              <td class="tt-col4">£0.75</td>
                              <td class="tt-col5">£6.00</td>
                            </tr>
                            <tr>
                              <td class="tt-col1">73.</td>
                              <td class="tt-col2">18-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Rollercoaster</a></td>
                              <td class="tt-col4">£0.75</td>
                              <td class="tt-col5">£5.25</td>
                            </tr>
                            <tr>
                              <td class="tt-col1">72.</td>
                              <td class="tt-col2">17-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Sarasota</a></td>
                              <td class="tt-col4">£0.75</td>
                              <td class="tt-col5">£4.50</td>
                            </tr>
                            <tr>
                              <td class="tt-col1">71.</td>
                              <td class="tt-col2"> 17-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Kickin The Beat (Bassline Mix)</a></td>
                              <td class="tt-col4">£0.75</td>
                              <td class="tt-col5">£3.75</td>
                            </tr>
                            <tr class="tt-withdrawal">
                              <td class="tt-col1"> -</td>
                              <td class="tt-col2">15-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Withdrawal to PayPal #01 </a></td>
                              <td class="tt-col4">£-6.00   </td>
                              <td class="tt-col5">£0.00</td>
                            </tr>
                            <tr>
                              <td class="tt-col1">70.</td>
                              <td class="tt-col2">17-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Pussy Marijuana (Bassline 2 Donkline Mix)</a></td>
                              <td class="tt-col4">£0.75</td>
                              <td class="tt-col5">£3.00</td>
                            </tr>
                            <tr>
                              <td class="tt-col1">69.</td>
                              <td class="tt-col2">16-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Pussy Marijuana (Bassline 2 Donkline Mix)</a></td>
                              <td class="tt-col4">£0.75</td>
                              <td class="tt-col5">£2.25</td>
                            </tr>
                            <tr>
                              <td class="tt-col1">68.</td>
                              <td class="tt-col2">16-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Kickin The Beat (Jack Sparrow Project Organ Mix) </a></td>
                              <td class="tt-col4">£0.75</td>
                              <td class="tt-col5">£1.50</td>
                            </tr>
                            <tr>
                              <td class="tt-col1">67.</td>
                              <td class="tt-col2">16-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Kickin The Beat (Bassline Mix)</a></td>
                              <td class="tt-col4">£0.75</td>
                              <td class="tt-col5">£0.75</td>
                            </tr>
                            <tr class="tt-shopping">
                              <td class="tt-col1"> -</td>
                              <td class="tt-col2">15-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Shopping:  #149001314 </a></td>
                              <td class="tt-col4">£-6.00   </td>
                              <td class="tt-col5">£0.00</td>
                            </tr>
                            <tr>
                              <td class="tt-col1">66.</td>
                              <td class="tt-col2"> 14-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Let It Go (Electroline Mix)</a></td>
                              <td class="tt-col4">£0.75     </td>
                              <td class="tt-col5">£6.00 </td>
                            </tr>
                            <tr>
                              <td class="tt-col1">65.</td>
                              <td class="tt-col2">14-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Rollercoaster</a></td>
                              <td class="tt-col4">£0.75</td>
                              <td class="tt-col5">£5.25</td>
                            </tr>
                            <tr>
                              <td class="tt-col1">64.</td>
                              <td class="tt-col2">14-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Rollercoaster</a></td>
                              <td class="tt-col4">£0.75</td>
                              <td class="tt-col5">£4.50</td>
                            </tr>
                            <tr>
                              <td class="tt-col1">63.</td>
                              <td class="tt-col2">14-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Sarasota</a></td>
                              <td class="tt-col4">£0.75</td>
                              <td class="tt-col5">£3.75</td>
                            </tr>
                            <tr>
                              <td class="tt-col1">62.</td>
                              <td class="tt-col2">14-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Kickin The Beat (Bassline Mix)</a></td>
                              <td class="tt-col4">£0.75</td>
                              <td class="tt-col5">£3.00</td>
                            </tr>
                            <tr>
                              <td class="tt-col1">61.</td>
                              <td class="tt-col2">13-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Pussy Marijuana (Bassline 2 Donkline Mix)</a></td>
                              <td class="tt-col4">£0.75</td>
                              <td class="tt-col5">£2.25</td>
                            </tr>
                            <tr>
                              <td class="tt-col1">60.</td>
                              <td class="tt-col2">13-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Pussy Marijuana (Bassline 2 Donkline Mix)</a></td>
                              <td class="tt-col4">£0.75</td>
                              <td class="tt-col5">£1.50</td>
                            </tr>
                            <tr>
                              <td class="tt-col1">59.</td>
                              <td class="tt-col2">12-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Kickin The Beat (Jack Sparrow Project Organ Mix) </a></td>
                              <td class="tt-col4">£0.75</td>
                              <td class="tt-col5">£0.75</td>
                            </tr>
                            <tr class="tt-shopping">
                              <td class="tt-col1"> -</td>
                              <td class="tt-col2">15-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Shopping:  #149001314 </a></td>
                              <td class="tt-col4">£-6.00   </td>
                              <td class="tt-col5">£0.00</td>
                            </tr>
                            <tr>
                              <td class="tt-col1">58.</td>
                              <td class="tt-col2">12-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Garridge Bassline </a></td>
                              <td class="tt-col4">£0.75     </td>
                              <td class="tt-col5">£6.00 </td>
                            </tr>
                            <tr>
                              <td class="tt-col1">57.</td>
                              <td class="tt-col2">11-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Let It Go (Electroline Mix)</a></td>
                              <td class="tt-col4">£0.75</td>
                              <td class="tt-col5">£5.25</td>
                            </tr>
                            <tr>
                              <td class="tt-col1">56.</td>
                              <td class="tt-col2">11-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Rollercoaster</a></td>
                              <td class="tt-col4">£0.75</td>
                              <td class="tt-col5">£4.50</td>
                            </tr>
                            <tr>
                              <td class="tt-col1">55.</td>
                              <td class="tt-col2">11-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Rollercoaster</a></td>
                              <td class="tt-col4">£0.75</td>
                              <td class="tt-col5">£3.75</td>
                            </tr>
                            <tr>
                              <td class="tt-col1">54.</td>
                              <td class="tt-col2">11-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Sarasota</a></td>
                              <td class="tt-col4">£0.75</td>
                              <td class="tt-col5">£3.00</td>
                            </tr>
                            <tr>
                              <td class="tt-col1">53.</td>
                              <td class="tt-col2">11-10-2010</td>
                              <td class="tt-col3">
                                <a href="#">Kickin The Beat (Bassline Mix)</a></td>
                              <td class="tt-col4">£0.75</td>
                              <td class="tt-col5">£2.25</td>
                            </tr>

                        </tbody>
                    </table>

                    <div class="bw-div3" id="bw-div3-tt">
                        <div class="bw-div3-inner">
                            <ul>
                                <li><a href="#" class="active">1</a></li>
                                <li><a href="#">2</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="button-silver-back" id="bw-div11">
                        <div class="button-silver-left"></div>
                        <div class="button-silver-right"></div>
                        <a href="#">Back</a>
                    </div>

                    <div class="clear"></div>

                </div>

                <div id="box-footer">
                    <div id="bf-paypal">
                        <a href="#"><img src="images/icons/paypal.gif" alt="PayPal" /></a>
                    </div>
                    <div class="clear"></div>
                </div>