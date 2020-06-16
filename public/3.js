(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[3],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/personas/PersonasTable.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/personas/PersonasTable.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _services_PersonaDataService__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../services/PersonaDataService */ "./resources/js/services/PersonaDataService.js");
/* harmony import */ var _services_CategoriaDataService__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../services/CategoriaDataService */ "./resources/js/services/CategoriaDataService.js");
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



function defaultItem() {
  return {
    id: -1,
    nombre: "",
    apellidos: "",
    telefono: "",
    direccion: "",
    rfc: "",
    hora_entrada: "",
    hora_salida: "",
    nacimiento: "",
    pago_fijo: "",
    es_nadador_indie: "",
    puesto: "",
    categoria_id: "" // created_user_id: "",
    // updated_user_id: ""

  };
}

function defaultGroup() {
  return {
    nombre: "Beneficiario"
  };
}

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      items: [],
      group: new defaultGroup(),
      currentItem: null,
      isModalActive: false,
      isPaginated: true,
      isSearchable: false,
      perPageList: [5, 10, 15, 20],
      perPage: 5,
      paginationPosition: "bottom",
      nullValue: "Sin valor"
    };
  },
  computed: {
    isEmpty: function isEmpty() {
      return this.items.length == 0;
    },
    nombreGroup: function nombreGroup() {
      return this.group.nombre.toLowerCase().slice(0, -1);
    }
  },
  components: {
    PersonaForm: function PersonaForm() {
      return __webpack_require__.e(/*! import() */ 9).then(__webpack_require__.bind(null, /*! ./PersonaForm */ "./resources/js/components/personas/PersonaForm.vue"));
    }
  },
  methods: {
    newItem: function newItem() {
      this.configForm(new defaultItem(), true);
    },
    editItem: function editItem(item) {
      this.configForm(item, true);
    },
    saveItem: function saveItem(item) {
      var _this = this;

      console.log(item);

      if (item.id == -1) {
        _services_PersonaDataService__WEBPACK_IMPORTED_MODULE_0__["default"].create(this.$route.params.id, item).then(function (response) {
          _this.fillTable();

          _this.configForm(new defaultItem(), false);

          _this.$buefy.toast.open("Guardado completado");
        })["catch"](function (error) {
          console.log(error);
        });
      } else {
        _services_PersonaDataService__WEBPACK_IMPORTED_MODULE_0__["default"].update(item.id, item).then(function (response) {
          _this.fillTable();

          _this.configForm(new defaultItem(), false);

          _this.$buefy.toast.open("Guardado completado");
        })["catch"](function (error) {
          console.log(error);
        });
      }
    },
    deleteItem: function deleteItem(item) {
      var _this2 = this;

      this.$buefy.dialog.confirm({
        title: "Borrar ".concat(this.group.nombre),
        message: "\xBFEstas seguro que desea borrar <b> ".concat(item.nombre, "</b>? Esta acci\xF3n no se puede revertir."),
        confirmText: "Borrar",
        cancelText: "Cancelar",
        type: "is-danger",
        hasIcon: true,
        onConfirm: function onConfirm() {
          _services_PersonaDataService__WEBPACK_IMPORTED_MODULE_0__["default"]["delete"](item.id).then(function (response) {
            _this2.fillTable();

            _this2.$buefy.toast.open("Borrado completado");
          })["catch"](function (error) {
            console.log(error);
          });
        }
      });
    },
    fillTable: function fillTable() {
      var _this3 = this;

      _services_PersonaDataService__WEBPACK_IMPORTED_MODULE_0__["default"].getAll(this.$route.params.id).then(function (response) {
        _this3.items = response.data.data;
      })["catch"](function (error) {
        console.log(error);
      });
    },
    refresh: function refresh() {
      this.fillTable();
      this.setGroup();
      this.configForm(new defaultItem(), false);
    },
    setGroup: function setGroup() {
      var _this4 = this;

      _services_CategoriaDataService__WEBPACK_IMPORTED_MODULE_1__["default"].get(this.$route.params.id).then(function (response) {
        _this4.group = response.data.data;
      })["catch"](function (error) {
        _this4.group = defaultGroup;
        console.log(error);
      });
    },
    configForm: function configForm(item, isModalActive) {
      this.currentItem = item;
      this.isModalActive = isModalActive;
    }
  },
  created: function created() {
    this.refresh();
  },
  watch: {
    $route: function $route(newValue, oldValue) {
      this.refresh();
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/personas/PersonasTable.vue?vue&type=template&id=f9f85f2c&":
/*!*************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/personas/PersonasTable.vue?vue&type=template&id=f9f85f2c& ***!
  \*************************************************************************************************************************************************************************************************************************/
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
    "div",
    [
      _c("h2", { staticClass: "subtitle" }, [_vm._v("Catalogos")]),
      _vm._v(" "),
      _c("h1", { staticClass: "title" }, [_vm._v(_vm._s(_vm.group.nombre))]),
      _vm._v(" "),
      _c(
        "b-modal",
        {
          attrs: {
            active: _vm.isModalActive,
            "has-modal-card": "",
            "trap-focus": "",
            "destroy-on-hide": true,
            "aria-role": "dialog",
            "aria-modal": ""
          },
          on: {
            "update:active": function($event) {
              _vm.isModalActive = $event
            }
          }
        },
        [
          _c("persona-form", {
            attrs: { group: _vm.nombreGroup, "init-persona": _vm.currentItem },
            on: { save: _vm.saveItem }
          })
        ],
        1
      ),
      _vm._v(" "),
      _c("b-field", { attrs: { grouped: "", "group-multiline": "" } }, [
        _c(
          "div",
          { staticClass: "control" },
          [
            _c(
              "b-button",
              {
                staticClass: "is-primary",
                attrs: { "icon-left": "plus" },
                on: { click: _vm.newItem }
              },
              [_vm._v("Agregar")]
            )
          ],
          1
        ),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "control" },
          [
            _c(
              "b-select",
              {
                attrs: { disabled: !_vm.isPaginated },
                model: {
                  value: _vm.perPage,
                  callback: function($$v) {
                    _vm.perPage = $$v
                  },
                  expression: "perPage"
                }
              },
              _vm._l(_vm.perPageList, function(item, index) {
                return _c("option", { key: index, domProps: { value: item } }, [
                  _vm._v(_vm._s(item) + " por página")
                ])
              }),
              0
            )
          ],
          1
        ),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "control" },
          [
            _c(
              "b-switch",
              {
                model: {
                  value: _vm.isSearchable,
                  callback: function($$v) {
                    _vm.isSearchable = $$v
                  },
                  expression: "isSearchable"
                }
              },
              [_vm._v("Realizar búsqueda")]
            )
          ],
          1
        )
      ]),
      _vm._v(" "),
      _c(
        "b-table",
        {
          attrs: {
            data: _vm.items,
            striped: true,
            narrowed: true,
            hoverable: true,
            selected: _vm.currentItem,
            paginated: _vm.isPaginated,
            "per-page": _vm.perPage,
            "pagination-position": _vm.paginationPosition,
            detailed: "",
            "detail-key": "id"
          },
          on: {
            "update:selected": function($event) {
              _vm.currentItem = $event
            }
          },
          scopedSlots: _vm._u([
            {
              key: "default",
              fn: function(props) {
                return [
                  _c(
                    "b-table-column",
                    {
                      attrs: {
                        field: "id",
                        label: "Id",
                        sortable: "",
                        numeric: "",
                        width: "80",
                        searchable: _vm.isSearchable
                      }
                    },
                    [
                      _c("span", { staticClass: "has-text-weight-bold" }, [
                        _vm._v(_vm._s(props.row.id))
                      ])
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "b-table-column",
                    {
                      attrs: {
                        field: "nombre",
                        label: "Nombre",
                        sortable: "",
                        searchable: _vm.isSearchable
                      }
                    },
                    [_vm._v(_vm._s(props.row.nombre))]
                  ),
                  _vm._v(" "),
                  _c(
                    "b-table-column",
                    {
                      attrs: {
                        field: "apellidos",
                        label: "Apellidos",
                        sortable: "",
                        searchable: _vm.isSearchable
                      }
                    },
                    [_vm._v(_vm._s(props.row.apellidos))]
                  ),
                  _vm._v(" "),
                  _c(
                    "b-table-column",
                    {
                      attrs: {
                        field: "telefono",
                        label: "Telefono",
                        sortable: ""
                      }
                    },
                    [_vm._v(_vm._s(props.row.telefono))]
                  ),
                  _vm._v(" "),
                  _c(
                    "b-table-column",
                    {
                      attrs: {
                        field: "created_at",
                        label: "Creado",
                        sortable: ""
                      }
                    },
                    [
                      _vm._v(
                        _vm._s(
                          new Date(props.row.created_at).toLocaleDateString()
                        )
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "b-table-column",
                    {
                      attrs: {
                        field: "updated_at",
                        label: "Actualizado",
                        sortable: ""
                      }
                    },
                    [
                      _vm._v(
                        _vm._s(
                          new Date(props.row.updated_at).toLocaleDateString()
                        )
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "b-table-column",
                    [
                      _c("b-button", {
                        attrs: { type: "is-success", "icon-left": "pen" },
                        on: {
                          click: function($event) {
                            return _vm.editItem(props.row)
                          }
                        }
                      }),
                      _vm._v(" "),
                      _c("b-button", {
                        attrs: { type: "is-danger", "icon-left": "times" },
                        on: {
                          click: function($event) {
                            return _vm.deleteItem(props.row)
                          }
                        }
                      })
                    ],
                    1
                  )
                ]
              }
            },
            {
              key: "detail",
              fn: function(props) {
                return [
                  _c("p", { staticClass: "subtitle is-uppercase" }, [
                    _c("strong", [
                      _vm._v(
                        _vm._s(props.row.nombre) +
                          " " +
                          _vm._s(props.row.apellidos)
                      )
                    ])
                  ]),
                  _vm._v(" "),
                  _c("p", { staticClass: "subtitle" }, [
                    _vm._v("Datos personales")
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "columns" }, [
                    _c("div", { staticClass: "column" }, [
                      _c("p", [
                        _c("strong", [_vm._v("Telefono:")]),
                        _vm._v(
                          "\n                        " +
                            _vm._s(props.row.telefono) +
                            "\n                    "
                        )
                      ]),
                      _vm._v(" "),
                      _c("p", [
                        _c("strong", [_vm._v("Dirección:")]),
                        _vm._v(
                          "\n                        " +
                            _vm._s(
                              props.row.direccion
                                ? props.row.direccion
                                : _vm.nullValue
                            ) +
                            "\n                    "
                        )
                      ]),
                      _vm._v(" "),
                      _c("p", [
                        _c("strong", [_vm._v("Fecha de nacimiento:")]),
                        _vm._v(
                          "\n                        " +
                            _vm._s(
                              props.row.nacimiento
                                ? props.row.nacimiento
                                : _vm.nullValue
                            ) +
                            "\n                    "
                        )
                      ]),
                      _vm._v(" "),
                      _c("p", [
                        _c("strong", [_vm._v("Edad:")]),
                        _vm._v(
                          "\n                        [edad]\n                    "
                        )
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "column" }, [
                      _c("p", [
                        _c("strong", [_vm._v("Horario:")]),
                        _vm._v(" "),
                        props.row.hora_entrada && props.row.hora_salida
                          ? _c("span", [
                              _vm._v(
                                _vm._s(props.row.hora_entrada) +
                                  " - " +
                                  _vm._s(props.row.hora_salida)
                              )
                            ])
                          : _c("span", [_vm._v(_vm._s(_vm.nullValue))])
                      ]),
                      _vm._v(" "),
                      _c("p", [
                        _c("strong", [_vm._v("Pago fijo:")]),
                        _vm._v(
                          "\n                        " +
                            _vm._s(
                              props.row.pago_fijo
                                ? props.row.pago_fijo
                                : _vm.nullValue
                            ) +
                            "\n                    "
                        )
                      ]),
                      _vm._v(" "),
                      _c("p", [
                        _c("strong", [_vm._v("Puesto:")]),
                        _vm._v(
                          "\n                        " +
                            _vm._s(
                              props.row.puesto
                                ? props.row.puesto
                                : _vm.nullValue
                            ) +
                            "\n                    "
                        )
                      ])
                    ])
                  ])
                ]
              }
            }
          ])
        },
        [
          _vm._v(" "),
          _c("template", { slot: "empty" }, [
            _c("section", { staticClass: "section" }, [
              _c(
                "div",
                {
                  staticClass: "notification is-info is-light has-text-centered"
                },
                [
                  _c(
                    "p",
                    [
                      _c("b-icon", {
                        attrs: { icon: "frown", size: "is-large" }
                      })
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c("p", [_vm._v("No hay registros")])
                ]
              )
            ])
          ])
        ],
        2
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/personas/PersonasTable.vue":
/*!************************************************************!*\
  !*** ./resources/js/components/personas/PersonasTable.vue ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _PersonasTable_vue_vue_type_template_id_f9f85f2c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./PersonasTable.vue?vue&type=template&id=f9f85f2c& */ "./resources/js/components/personas/PersonasTable.vue?vue&type=template&id=f9f85f2c&");
/* harmony import */ var _PersonasTable_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./PersonasTable.vue?vue&type=script&lang=js& */ "./resources/js/components/personas/PersonasTable.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _PersonasTable_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _PersonasTable_vue_vue_type_template_id_f9f85f2c___WEBPACK_IMPORTED_MODULE_0__["render"],
  _PersonasTable_vue_vue_type_template_id_f9f85f2c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/personas/PersonasTable.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/personas/PersonasTable.vue?vue&type=script&lang=js&":
/*!*************************************************************************************!*\
  !*** ./resources/js/components/personas/PersonasTable.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PersonasTable_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./PersonasTable.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/personas/PersonasTable.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PersonasTable_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/personas/PersonasTable.vue?vue&type=template&id=f9f85f2c&":
/*!*******************************************************************************************!*\
  !*** ./resources/js/components/personas/PersonasTable.vue?vue&type=template&id=f9f85f2c& ***!
  \*******************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PersonasTable_vue_vue_type_template_id_f9f85f2c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./PersonasTable.vue?vue&type=template&id=f9f85f2c& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/personas/PersonasTable.vue?vue&type=template&id=f9f85f2c&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PersonasTable_vue_vue_type_template_id_f9f85f2c___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PersonasTable_vue_vue_type_template_id_f9f85f2c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/services/PersonaDataService.js":
/*!*****************************************************!*\
  !*** ./resources/js/services/PersonaDataService.js ***!
  \*****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }


var url = '/api/personas';

var PersonaDataService = /*#__PURE__*/function () {
  function PersonaDataService() {
    _classCallCheck(this, PersonaDataService);
  }

  _createClass(PersonaDataService, [{
    key: "getAll",
    value: function getAll(categoria_id) {
      return axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("/api/categorias/".concat(categoria_id, "/personas"));
    }
  }, {
    key: "get",
    value: function get(id) {
      return axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("".concat(url, "/").concat(id));
    } // findByName(title){}

  }, {
    key: "create",
    value: function create(categoria_id, data) {
      return axios__WEBPACK_IMPORTED_MODULE_0___default.a.post("/api/categorias/".concat(categoria_id, "/personas"), data);
    }
  }, {
    key: "update",
    value: function update(id, data) {
      return axios__WEBPACK_IMPORTED_MODULE_0___default.a.put("".concat(url, "/").concat(id), data);
    }
  }, {
    key: "delete",
    value: function _delete(id) {
      return axios__WEBPACK_IMPORTED_MODULE_0___default.a["delete"]("".concat(url, "/").concat(id));
    }
  }]);

  return PersonaDataService;
}();

/* harmony default export */ __webpack_exports__["default"] = (new PersonaDataService());

/***/ })

}]);