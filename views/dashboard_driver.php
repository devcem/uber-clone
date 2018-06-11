<div v-show="status">
	<div v-show="location.detected">
		<table v-show="requests.length > 0">
			<thead>
			<tr>
				<th>Distance</th>
				<th>Arrival</th>
				<th width="10"></th>
			</tr>
			</thead>
			<tbody>
				<tr v-for="request in requests">
					<td><h4>{{request.distance}}<small>km</small></h4></td>
					<td><h4>{{request.arrival}}<small>km</small></h4></td>
					<td>
						<button class="waves-effect waves-light btn-large green darken-2"><i class="material-icons">check</i></button>
					</td>
				</tr>
			</tbody>
		</table>
		<p v-show="requests.length == 0" class="center-align">Waiting for customer's requests...</p>

		<br>

		<h5><i class="material-icons prefix">location_on</i> My Location</h5>
		<table>
			<tbody>
				<tr>
					<td>{{location.name}}</td>
				</tr>
			</tbody>
		</table>
		<table>
			<tbody>
				<tr>
					<th>Latitute :</th>
					<td>{{location.lat}}</td>
				</tr>
				<tr>
					<th>Longtitute :</th>
					<td>{{location.lng}}</td>
				</tr>
				<tr>
					<th>Time :</th>
					<td>{{location.timestamp}}</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div v-show="!location.detected">
		<p>Your current location couldn't detect by system, please make sure you allowed GPS and internet connections.</p>
		<button v-on:click="detectLocation()" class="waves-effect waves-light btn-large z-depth-0">Retry</button>
	</div>
</div>
<div v-show="!status">
	You are currently offline. Please switch on your status to be visible.
</div>