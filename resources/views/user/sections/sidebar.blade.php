
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic" align="center">
					<img src="https://www.gravatar.com/avatar/{{ md5($user->email) }}" alt="" style="width:initial; height:initial">
				</div>

				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle"
					<div class="profile-usertitle-name">
				  								 <a href="http://gravatar.com" target="_blank" id="gravatar-change">Change Gravatar</a>
				  								 <br>
						{{ $user->name }}
					</div>
					<div class="profile-usertitle-job">
						{{ $user->country }} {{ $user->city }}
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">

				</div>
				<!-- END SIDEBAR BUTTONS -->

		
		<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li>
							<a href="{{ Baseurl("/user/saved") }}">
							<i class="glyphicon glyphicon-floppy-disk"></i>
							{{ trans('lang.saved') }}							
							</a>
						</li>						
					<!--
						<li>
							<a href="/user/editProfile">
							<i class="glyphicon glyphicon-user"></i>
							Edit Profile </a>
						</li>
						-->
						<li>
							<a href="{{ Baseurl("/user/accountSettings") }}">
							<i class="glyphicon glyphicon-user"></i>
							{{ trans('lang.accountsettings') }} </a>
						</li>
						<li>
							<a href="/logout">
							<i class="glyphicon glyphicon-log-out"></i>
							{{ trans('lang.logout') }} </a>
						</li>
					</ul>

