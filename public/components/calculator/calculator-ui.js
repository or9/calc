(function (doc, app, undefined) {

  var CalculatorPrototype = Object.create(HTMLElement.prototype, {
    "createdCallback": { value: created },
    "attachedCallback": { value: attached },
    "detachedCallback": { value: detached },
    "attributeChangedCallback": { value: changed }
  });

  document.registerElement("calculator-ui", {
    prototype: CalculatorPrototype
  });

  function created () {
    var template = doc.querySelector("template");
    var clone = document.importNode(template.content, true);

    //clone.querySelector("#output")
    //	    .value = document.querySelector("#calculation").value;

    this.createShadowRoot().appendChild(clone); // shadow DOM
    //this.appendChild(clone); // light DOM

    //document.querySelector("calculator-ui::shadow #output").value = document.querySelector("#calculation").value;


  }

  function attached () {
    //
  }

  function detached () {
    //
  }

  function changed (attrName, oldVal, newVal) {
  	  console.log("calculator-ui attr changed: ", attrName, oldVal, newVal);
  }

}(document._currentScript.ownerDocument, heroLaraCalculator));
