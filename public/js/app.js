var heroLaraCalculator = (function (doc, undefined) {
	// initial number add
	// n -> operator -> n -> operator…
	// each operator will perform operation with new field value

	var	field,
		operator,
		operated = false,
		calculated = false;

	return {
		clear: clear,
		equals: equals,
		get field () {
			return field;
		},
		set field (element) {
			field = element;
		},
		setFieldValue: setFieldValue,
		setOperator: setOperator
	};

	function clear () {
		request("clear");
	}

	function setFieldValue (value) {
		if (operated && !calculated) {

			operated = false;
			return field.value = value;

		}

		if (calculated) {

			calculated = false;
			return field.value = value;
		}


		if (parseInt(field.value) > 0) {

			field.value += "" + value;

		} else {
			field.value = value || 0;

		}

	}

	function setOperator (element) {

		if (element.dataset && element.dataset.operator) {

			operator = element.dataset.operator;

		} else {

			operator = element;

		}


		if (!calculated && !operated) {
			operated = true;
			return request("add");
		}


	}

	function equals () {
		request();
	}

	function request (method) {
		var endpoint = method || operator || "add";
		var xhr = new XMLHttpRequest();
		var data = new FormData();

		if (field.value === "") {
			field.value = "0";
		}

		data.append("value", field.value);

		xhr.open("POST", "/api/" + endpoint, true);
		xhr.timeout = 3000;
		xhr.onload = onload;
		xhr.onerror = xhr.ontimeout = onerror;

		xhr.send(data);

		function onload () {
			try {
				data = JSON.parse(this.responseText);
			} catch (err) {
				onerror(err);
			}


			if (method === "clear") {

				calculated = false;
				operated = false;
				operator = null;
				return field.value = "";

			} else {

				calculated = true;

			}

			setFieldValue(data.value);

		}

		function onerror (err) {
			console.log("this is so messed up ", this, err);
		}

	}

})(document);
