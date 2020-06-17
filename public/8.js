(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[8],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/personas/PersonaForm.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/personas/PersonaForm.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      persona: this.initPersona,
      puestos: ["ENTRENADOR", "ALBERQUERO", "ADMINISTRADOR", "SUPLENTE"]
    };
  },
  props: {
    initPersona: {
      type: Object,
      required: true
    },
    categoria: {
      type: String,
      "default": "Beneficiario"
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/personas/PersonaForm.vue?vue&type=template&id=9fd9691a&":
/*!***********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/personas/PersonaForm.vue?vue&type=template&id=9fd9691a& ***!
  \***********************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "form",
    {
      on: {
        submit: function($event) {
          $event.preventDefault()
          return _vm.$emit("save", _vm.persona)
        }
      }
    },
    [
      _c("div", { staticClass: "modal-card" }, [
        _c("header", { staticClass: "modal-card-head" }, [
          _c("p", { staticClass: "modal-card-title" }, [
            _vm._v("Nuevo " + _vm._s(_vm.categoria))
          ])
        ]),
        _vm._v(" "),
        _c(
          "section",
          { staticClass: "modal-card-body" },
          [
            _c(
              "b-field",
              { attrs: { grouped: "" } },
              [
                _c(
                  "b-field",
                  { attrs: { label: "Nombre" } },
                  [
                    _c("b-input", {
                      attrs: {
                        type: "text",
                        name: "nombre",
                        required: "",
                        "custom-class": "is-uppercase"
                      },
                      model: {
                        value: _vm.persona.nombre,
                        callback: function($$v) {
                          _vm.$set(_vm.persona, "nombre", $$v)
                        },
                        expression: "persona.nombre"
                      }
                    })
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "b-field",
                  { attrs: { label: "Apellidos", expanded: "" } },
                  [
                    _c("b-input", {
                      attrs: {
                        type: "text",
                        name: "apellidos",
                        required: "",
                        "custom-class": "is-uppercase"
                      },
                      model: {
                        value: _vm.persona.apellidos,
                        callback: function($$v) {
                          _vm.$set(_vm.persona, "apellidos", $$v)
                        },
                        expression: "persona.apellidos"
                      }
                    })
                  ],
                  1
                )
              ],
              1
            ),
            _vm._v(" "),
            _c(
              "b-field",
              { attrs: { grouped: "" } },
              [
                _c(
                  "b-field",
                  { attrs: { label: "Telefono" } },
                  [
                    _c("b-input", {
                      attrs: {
                        type: "phone",
                        name: "telefono",
                        maxlength: "10",
                        min: "0"
                      },
                      model: {
                        value: _vm.persona.telefono,
                        callback: function($$v) {
                          _vm.$set(_vm.persona, "telefono", $$v)
                        },
                        expression: "persona.telefono"
                      }
                    })
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "b-field",
                  { attrs: { label: "Fecha de nacimiento", expanded: "" } },
                  [
                    _c(
                      "b-datepicker",
                      {
                        attrs: {
                          icon: "calendar-day",
                          editable: "",
                          position: "is-bottom-right",
                          placeholder: "Teclee o seleccione una fecha"
                        },
                        model: {
                          value: _vm.persona.nacimiento,
                          callback: function($$v) {
                            _vm.$set(_vm.persona, "nacimiento", $$v)
                          },
                          expression: "persona.nacimiento"
                        }
                      },
                      [
                        _c(
                          "button",
                          {
                            staticClass: "button is-primary",
                            on: {
                              click: function($event) {
                                _vm.persona.nacimiento = new Date()
                              }
                            }
                          },
                          [
                            _c("b-icon", { attrs: { icon: "calendar-day" } }),
                            _vm._v(" "),
                            _c("span", [_vm._v("Hoy")])
                          ],
                          1
                        ),
                        _vm._v(" "),
                        _c(
                          "button",
                          {
                            staticClass: "button is-danger",
                            on: {
                              click: function($event) {
                                _vm.persona.nacimiento = null
                              }
                            }
                          },
                          [
                            _c("b-icon", { attrs: { icon: "times" } }),
                            _vm._v(" "),
                            _c("span", [_vm._v("Limpiar")])
                          ],
                          1
                        )
                      ]
                    )
                  ],
                  1
                )
              ],
              1
            ),
            _vm._v(" "),
            _c(
              "b-field",
              { attrs: { label: "Direccion" } },
              [
                _c("b-input", {
                  attrs: {
                    type: "text",
                    name: "direccion",
                    "custom-class": "is-uppercase"
                  },
                  model: {
                    value: _vm.persona.direccion,
                    callback: function($$v) {
                      _vm.$set(_vm.persona, "direccion", $$v)
                    },
                    expression: "persona.direccion"
                  }
                })
              ],
              1
            ),
            _vm._v(" "),
            _c(
              "b-field",
              { attrs: { grouped: "" } },
              [
                _c(
                  "b-field",
                  { attrs: { label: "Puesto" } },
                  [
                    _c(
                      "b-select",
                      {
                        attrs: { placeholder: "Seleccione un puesto" },
                        model: {
                          value: _vm.persona.puesto,
                          callback: function($$v) {
                            _vm.$set(_vm.persona, "puesto", $$v)
                          },
                          expression: "persona.puesto"
                        }
                      },
                      _vm._l(_vm.puestos, function(option, index) {
                        return _c(
                          "option",
                          { key: index, domProps: { value: option } },
                          [_vm._v(_vm._s(option))]
                        )
                      }),
                      0
                    )
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "b-field",
                  { attrs: { label: "Pago fijo" } },
                  [
                    _c("b-input", {
                      attrs: {
                        type: "number",
                        min: "0",
                        placeholder: "Teclee el pago"
                      },
                      model: {
                        value: _vm.persona.pago_fijo,
                        callback: function($$v) {
                          _vm.$set(_vm.persona, "pago_fijo", $$v)
                        },
                        expression: "persona.pago_fijo"
                      }
                    })
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "b-checkbox",
                  {
                    model: {
                      value: _vm.persona.es_nadador_indie,
                      callback: function($$v) {
                        _vm.$set(_vm.persona, "es_nadador_indie", $$v)
                      },
                      expression: "persona.es_nadador_indie"
                    }
                  },
                  [_vm._v("Es nadador independiente")]
                )
              ],
              1
            ),
            _vm._v(" "),
            _c(
              "b-field",
              { attrs: { grouped: "" } },
              [
                _c(
                  "b-field",
                  { attrs: { label: "Hora entrada" } },
                  [
                    _c("b-timepicker", {
                      attrs: {
                        icon: "clock",
                        editable: "",
                        "hour-format": "12",
                        inline: ""
                      },
                      model: {
                        value: _vm.persona.hora_entrada,
                        callback: function($$v) {
                          _vm.$set(_vm.persona, "hora_entrada", $$v)
                        },
                        expression: "persona.hora_entrada"
                      }
                    })
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "b-field",
                  { attrs: { label: "Hora salida" } },
                  [
                    _c("b-timepicker", {
                      attrs: {
                        icon: "clock",
                        editable: "",
                        "hour-format": "12",
                        inline: ""
                      },
                      model: {
                        value: _vm.persona.hora_salida,
                        callback: function($$v) {
                          _vm.$set(_vm.persona, "hora_salida", $$v)
                        },
                        expression: "persona.hora_salida"
                      }
                    })
                  ],
                  1
                )
              ],
              1
            )
          ],
          1
        ),
        _vm._v(" "),
        _c("footer", { staticClass: "modal-card-foot" }, [
          _c(
            "button",
            {
              staticClass: "button",
              attrs: { type: "button" },
              on: {
                click: function($event) {
                  return _vm.$parent.close()
                }
              }
            },
            [_vm._v("Cancelar")]
          ),
          _vm._v(" "),
          _c("button", { staticClass: "button is-primary" }, [
            _vm._v("Guardar")
          ])
        ])
      ])
    ]
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/personas/PersonaForm.vue":
/*!**********************************************************!*\
  !*** ./resources/js/components/personas/PersonaForm.vue ***!
  \**********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _PersonaForm_vue_vue_type_template_id_9fd9691a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./PersonaForm.vue?vue&type=template&id=9fd9691a& */ "./resources/js/components/personas/PersonaForm.vue?vue&type=template&id=9fd9691a&");
/* harmony import */ var _PersonaForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./PersonaForm.vue?vue&type=script&lang=js& */ "./resources/js/components/personas/PersonaForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _PersonaForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _PersonaForm_vue_vue_type_template_id_9fd9691a___WEBPACK_IMPORTED_MODULE_0__["render"],
  _PersonaForm_vue_vue_type_template_id_9fd9691a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/personas/PersonaForm.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/personas/PersonaForm.vue?vue&type=script&lang=js&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/personas/PersonaForm.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PersonaForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./PersonaForm.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/personas/PersonaForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PersonaForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/personas/PersonaForm.vue?vue&type=template&id=9fd9691a&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/components/personas/PersonaForm.vue?vue&type=template&id=9fd9691a& ***!
  \*****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PersonaForm_vue_vue_type_template_id_9fd9691a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./PersonaForm.vue?vue&type=template&id=9fd9691a& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/personas/PersonaForm.vue?vue&type=template&id=9fd9691a&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PersonaForm_vue_vue_type_template_id_9fd9691a___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PersonaForm_vue_vue_type_template_id_9fd9691a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);