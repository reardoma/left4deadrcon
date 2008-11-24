<?php
	include_once("includes/config.php");
	include_once("display_includes/top.php");
?>
<div id="wrapper">
	<?php include('display_includes/notice.php');?>
	
	<?php if(!isset($_SESSION['connected']) || !$_SESSION['connected']){ ?>
		<form action="/rpc/connect.php" method="post" id="connect">
			<label for="server">Server IP &amp; Port<div class="help">("xxx.xxx.xxx.xxx:xxxxx")</div></label>
			<input type="text" name="server" id="server" />
			
			<label for="password">Server Rcon password</label>
			<input type="password" name="password" id="password" />
			<input type="submit" value="Connect"  class="submit" />
		</form>
	<?php } ?>

	<div id="maincontrols" <?php if(!isset($_SESSION['connected']) || !$_SESSION['connected']){ echo 'style="display:none"';}?>>
		<div id="serverstatus">
			<h2>Server status</h2>
			<dl></dl>
		</div>

		<div id="common">
			<h2>Common actions</h2>
			<form action="/rpc/runcommand.php" method="post" class="command">
				<label>Change map</label>
				<select name="command">
					<option value="changelevel l4d_hospital01_apartment">Coop: hospital 1 - apartment</option>
					<option value="changelevel l4d_hospital02_subway">Coop: hospital 2 - subway</option>
					<option value="changelevel l4d_hospital03_sewers">Coop: hospital 3 - sewers</option>
					<option value="changelevel l4d_hospital04_interior">Coop: hospital 4 - interior</option>
					<option value="changelevel l4d_hospital05_rooftop">Coop: hospital 5 - rooftop</option>
					<option value="changelevel l4d_smalltown01_caves">Coop: smalltown 1 - caves</option>
					<option value="changelevel l4d_smalltown02_drainage">Coop: smalltown 2 - drainage</option>
					<option value="changelevel l4d_smalltown03_ranchhouse">Coop: smalltown 3 - ranchhouse</option>
					<option value="changelevel l4d_smalltown04_mainstreet">Coop: smalltown 4 - mainstreet</option>
					<option value="changelevel l4d_smalltown05_houseboat">Coop: smalltown 5 - houseboat</option>
					<option value="changelevel l4d_farm01_hilltop">Coop: farm 1 - hilltop</option>
					<option value="changelevel l4d_farm02_traintunnel">Coop: farm 2 - traintunnel</option>
					<option value="changelevel l4d_farm03_bridge">Coop: farm 3 - bridge</option>
					<option value="changelevel l4d_farm04_barn">Coop: farm 4 - barn</option>
					<option value="changelevel l4d_farm05_cornfield">Coop: farm 5 - cornfield</option>
					<option value="changelevel l4d_airport01_greenhouse">Coop: airport 1 - greenhouse</option>
					<option value="changelevel l4d_airport02_offices">Coop: airport 2 - offices</option>
					<option value="changelevel l4d_airport03_garage">Coop: airport 3 - garage</option>
					<option value="changelevel l4d_airport04_terminal">Coop: airport 4 - terminal</option>
					<option value="changelevel l4d_airport05_runway">Coop: airport 5 - runwayoption>
					<option value="changelevel l4d_vs_hospital01_apartment">Versus: hospital 1 - apartment</option>
					<option value="changelevel l4d_vs_hospital02_subway">Versus: hospital 2 - subway</option>
					<option value="changelevel l4d_vs_hospital03_sewers">Versus: hospital 3 - sewers</option>
					<option value="changelevel l4d_vs_hospital05_rooftop">Versus: hospital 5 - rooftop</option>
					<option value="changelevel l4d_vs_hospital04_interior">Versus: hospital 4 -interior</option>
					<option value="changelevel l4d_vs_farm01_hilltop">Versus: farm 1 - hilltop</option>
					<option value="changelevel l4d_vs_farm02_traintunnel">Versus: farm 2 - traintunnel</option>
					<option value="changelevel l4d_vs_farm03_bridge">Versus: farm 3 - bridge</option>
					<option value="changelevel l4d_vs_farm04_barn">Versus: farm 4 - barn</option>
					<option value="changelevel l4d_vs_farm05_cornfield">Versus: farm 5 - cornfield</option>
				</select>
				<input type="submit" value="Change" class="submit"/>
			</form>
			
			<form action="/rpc/runcommand.php" method="post" class="command">
				<label>Change difficulty</label>
				<select name="command">
					<option value="z_difficulty easy">Easy</option>
					<option value="z_difficulty normal">Normal</option>
					<option value="z_difficulty hard">Hard</option>
					<option value="z_difficulty impossible">Impossible</option>
				</select>
				<input type="submit" value="Change" class="submit" />
			</form>
			
			<form action="/rpc/runcommand.php" method="post" class="command">
				<label>Send everyone a message</label>
				<input type="text" name="command" title="say " />
				<input type="submit" value="Send" class="submit" />
			</form>
			
			<form action="/rpc/runcommand.php" method="post" class="command">
				<label>Set server access password</label>
				<input type="password" name="command" title="sv_password " />
				<input type="submit" value="Change" class="submit" />
			</form>

		</div>
		
		<div id="console">
			<h2>Console</h2>
			<div id="consolelog"></div>
			<form action="/rpc/runcommand.php" method="post" class="command">
				<label>Console command</label>
				<input type="text" name="command" />
				<input type="submit" value="Send" class="submit" />
			</form>
		</div>
	</div>
</div>
<?php
	include_once("display_includes/bottom.php");
?>
