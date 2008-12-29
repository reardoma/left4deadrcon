<?php
	include_once("includes/config.php");
	include_once("display_includes/top.php");
?>
<div id="wrapper">
	<?php include('display_includes/notice.php');?>
		
	<?php if(!isset($_SESSION['connected']) || !$_SESSION['connected']){ ?>

		<form action="rpc/connect.php" method="post" id="connect">
			<h2>Login</h2>
			<div class="containertop"></div>
			<div class="container">
				<ul>
					<li>
						<label for="server">Server IP &amp; Port</label>
						<input type="text" name="server" id="server" />
					</li>
					<li>
						<label for="password">Server Rcon password</label>
						<input type="password" name="password" id="password" />
					</li>
				</ul>
				<input type="submit" value="Connect" class="submit" />
			</div>
			<div class="containerbottom"></div>
		</form>
		
	<?php }else{ ?>
		
		<ul id="menu">
			<li class="selected"><a href="" class="serverinfo">Server</a><span></span></li>
			<li><a href="" class="playerlist">Players</a><span></span></li>
		</ul>
		<div id="serverinfo" class="tabbedcontent">
			<div class="containertop"></div>
			<div class="container">
				<ul>
					<li class="ip noedit">
						<label>IP:</label>
						<p></p>
					</li>
					<li class="hostname">
						<form action="rpc/runcommand.php" method="post" class="command">
							<label for="hostname">Name:</label>
							<p></p>
							<input type="text" name="command" id="hostname" class="command" />
							<input type="hidden" name="prefix" value="hostname " class="prefix" />
							<input type="submit" value="submit" class="submit" />
						</form>
					</li>
					<li class="map">
						<form action="rpc/runcommand.php" method="post" class="command">
							<label for="changelevel">Map:</label>
							<p></p>
							<select name="command" id="changelevel" class="command">
								<option value="l4d_hospital01_apartment">Coop: hospital 1 - apartment</option>
								<option value="l4d_hospital02_subway">Coop: hospital 2 - subway</option>
								<option value="l4d_hospital03_sewers">Coop: hospital 3 - sewers</option>
								<option value="l4d_hospital04_interior">Coop: hospital 4 - interior</option>
								<option value="l4d_hospital05_rooftop">Coop: hospital 5 - rooftop</option>
								<option value="l4d_smalltown01_caves">Coop: smalltown 1 - caves</option>
								<option value="l4d_smalltown02_drainage">Coop: smalltown 2 - drainage</option>
								<option value="l4d_smalltown03_ranchhouse">Coop: smalltown 3 - ranchhouse</option>
								<option value="l4d_smalltown04_mainstreet">Coop: smalltown 4 - mainstreet</option>
								<option value="l4d_smalltown05_houseboat">Coop: smalltown 5 - houseboat</option>
								<option value="l4d_farm01_hilltop">Coop: farm 1 - hilltop</option>
								<option value="l4d_farm02_traintunnel">Coop: farm 2 - traintunnel</option>
								<option value="l4d_farm03_bridge">Coop: farm 3 - bridge</option>
								<option value="l4d_farm04_barn">Coop: farm 4 - barn</option>
								<option value="l4d_farm05_cornfield">Coop: farm 5 - cornfield</option>
								<option value="l4d_airport01_greenhouse">Coop: airport 1 - greenhouse</option>
								<option value="l4d_airport02_offices">Coop: airport 2 - offices</option>
								<option value="l4d_airport03_garage">Coop: airport 3 - garage</option>
								<option value="l4d_airport04_terminal">Coop: airport 4 - terminal</option>
								<option value="l4d_airport05_runway">Coop: airport 5 - runwayoption>
								<option value="l4d_vs_hospital01_apartment">Versus: hospital 1 - apartment</option>
								<option value="l4d_vs_hospital02_subway">Versus: hospital 2 - subway</option>
								<option value="l4d_vs_hospital03_sewers">Versus: hospital 3 - sewers</option>
								<option value="l4d_vs_hospital05_rooftop">Versus: hospital 5 - rooftop</option>
								<option value="l4d_vs_hospital04_interior">Versus: hospital 4 -interior</option>
								<option value="l4d_vs_farm01_hilltop">Versus: farm 1 - hilltop</option>
								<option value="l4d_vs_farm02_traintunnel">Versus: farm 2 - traintunnel</option>
								<option value="l4d_vs_farm03_bridge">Versus: farm 3 - bridge</option>
								<option value="l4d_vs_farm04_barn">Versus: farm 4 - barn</option>
								<option value="l4d_vs_farm05_cornfield">Versus: farm 5 - cornfield</option>
							</select>
							<input type="hidden" name="prefix" value="changelevel " class="prefix" />
							<input type="submit" value="submit" class="submit" />
						</form>
					</li>
					<li class="difficulty">
						<form action="rpc/runcommand.php" method="post" class="command">
							<label for="z_difficulty">Difficulty:</label>
							<p></p>
							<select name="command" id="z_difficulty" class="command">
								<option value="easy">Easy</option>
								<option value="normal">Normal</option>
								<option value="hard">Hard</option>
								<option value="impossible">Impossible</option>
							</select>
							<input type="hidden" name="prefix" value="z_difficulty " class="prefix" />
							<input type="submit" value="submit" class="submit" />
						</form>
					</li>
					<li class="password">
						<form action="rpc/runcommand.php" method="post" class="command">
							<label for="sv_password">Server password:</label>
							<p></p>
							<input type="password" name="command" id="sv_password" class="command" />
							<input type="hidden" name="prefix" value="sv_password " class="prefix" />
							<input type="submit" value="submit" class="submit" />
						</form>
					</li>
				</ul>
				
			</div>
			<div class="containerbottom"></div>
		</div>
			
		<div id="playerlist" class="tabbedcontent">
			<div class="containertop"></div>
			<div class="container">
				<table cellspacing="1" cclass="tabbedcontent">
					<col width="5%"/>
					<col width="14%"/>
					<col width="10%"/>
					<col width="7%"/>
					<col width="5%" />
					<col width="7%"/>
					<col width="14%"/>
					<thead>
						<th>ID</th>
						<th>Name</th>
						<th>Uniqid</th>
						<th>Time</th>
						<th>Ping</th>
						<th>Status</th>
						<th>IP</th>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			<div class="containerbottom"></div>
		</div>

	
	<div>
	<div id="console">
		<h2>Console</h2>
		<div id="consolecontainer">
			<form action="rpc/runcommand.php" method="post" class="command">
				<label>Command</label>
				<input type="text" name="command" class="command" />
				<input type="submit" value="submit" class="submit" />
			</form>
			<div id="consolelog"></div>
		</div>
	</div>
	</div>
</div>
<?php } ?>
<?php
	include_once("display_includes/bottom.php");
?>



