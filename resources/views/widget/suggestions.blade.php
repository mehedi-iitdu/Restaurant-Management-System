<div class="ticket-search-results" stop-parent-scroll="">
                        <!----><div ng-if="ctrl.widgetService.result.length > 0" class="suggested-tickets">
                            <div>
                                Your results
                                <div class="result-indicator">
                                    <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#result-indicator"></use></svg>
                                </div>
                            </div>
                        </div><!---->
                        <!----><div class="filtered-ticket searched-ticket angular-animate" ng-repeat="ticket in ctrl.widgetService.result" ng-click="ctrl.goToTicket(ticket)" style="">
                            <div class="filtered-image cover-img">
                                <img ng-src="https://ftstorageprod.blob.core.windows.net/images/ticket/04d092d8/998601ae-27c4-4a37-bda8-cd249a595b71" src="https://ftstorageprod.blob.core.windows.net/images/ticket/04d092d8/998601ae-27c4-4a37-bda8-cd249a595b71">
                                <!----><div ng-if="ticket.deposit" class="ticket-tag deposit">
                                    <span>Deposit €50</span>
                                </div><!---->
                                <!---->
                                <!---->
                                <!---->
                            </div>
                            <div class="filtered-info">
                                <div class="filtered-intro clear">
                                    <div class="filtered-title">Reservation</div>
                                    <div class="filtered-price">
                                        <!---->
                                        <!---->
                                    </div>
                                </div>
                                <div class="filtered-short">
                                    <p clamp="3" style="overflow: hidden; text-overflow: ellipsis; -webkit-box-orient: vertical; display: -webkit-box; -webkit-line-clamp: 3;">A la carte reservations with a €50 deposit per person.

If there are important dietary requirements or allergies, please reply to this email to let the kitchen know. Unfortunately, we can not always accommodate last-minute dietary requirements or allergies.</p>
                                </div>
                            </div>
                        </div><!---->
                        <!-- Only show when there are no results -->
                        <!---->
                    </div>
