<div v-show="!location.detected">
	<p>Your current location couldn't detect by system, please make sure you allowed GPS and internet connections.</p>
	<button v-on:click="detectLocation()" class="waves-effect waves-light btn-large z-depth-0">Retry</button>
</div>
<div v-show="location.detected">
	<form>
		<h5 class="center-align">Where do you want to go?</h5>
		<div class="input-field col s12">
	        <i class="material-icons prefix">location_on</i>
	        <input id="search_in_locations" name="phone" type="text" class="validate">
	        <label for="search_in_locations">Search in locations</label>
	    </div>

	    <table v-show="locations.length > 0">
			<thead>
			<tr>
				<th>Dist.</th>
				<th>Location</th>
				<th width="10"></th>
			</tr>
			</thead>
			<tbody>
				<tr v-for="location in locations">
					<td><h6>{{location.distance}}<small>km</small></h6></td>
					<td><small>{{location.name}}</small></td>
					<td>
						<button class="waves-effect waves-light btn green darken-2"><i class="material-icons">add_location</i></button>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</div>