				<!-- Confirming trip -->
				<div>
					<br>
					<lable><b>Masukkan ID: </b></lable>
					<input class="idtrip" type="text" name="confirmdestid" placeholder="Trip ID for confirmation">  <i class="fa fa-asterisk" style="font-size:14px;color:red"></i>
				</div>
				<br>
				<!-- Change category -->
				<div>
					<lable>Change category: </lable>
					<select name="newcategory">
						<option value="Kategori">Kategori</option>
						<option value="Mesyuarat">Mesyuarat</option>
						<option value="Kursus">Kursus</option>
						<option value="Bengkel">Bengkel</option>
						<option value="Lawatan Tapak">Lawatan Tapak</option>
					</select>
					<button class="btn btn-secondary btn-sm" name="change-category">edit</button>
				</div>
				<br>
				<!-- Change workname -->
				<div>
					<input type="text" name="newworkname" placeholder="Enter new name for the work">
					<button class="btn btn-secondary btn-sm" name="change-workname">edit</button>
				</div>
				<br>
				<!-- Change placename -->
				<div>
					<input type="text" name="newdestname" placeholder="Enter new for place being held">
					<button class="btn btn-secondary btn-sm" name="change-destname">edit</button>
				</div>
				<br>
				<!-- Change date -->
				<div>
					<label>Change date: </label>
					<input id="DTformat" type="date" name="newstart">
					<input id="DTformat" type="date" name="newend">
					<button class="btn btn-secondary btn-sm" name="change-date">edit</button>
				</div>
				<br>
				<!-- Change time -->
				<div>
					<label>Change time: </label>
					<input id="DTformat" type="time" name="newstarttime">
					<input id="DTformat" type="time" name="newendtime">
					<button class="btn btn-secondary btn-sm" name="change-time">edit</button>
				</div>
				<button class="btn btn-dark btn-sm" type="Reset">Reset</button>
				<br>