$((function(){"use strict";var e=$(".datatable-project"),t=$(".datatable-invoice");if(e.length)e.DataTable({ajax:assetsPath+"json/projects-list.json",columns:[{data:"hours"},{data:"project_name"},{data:"total_task"},{data:"progress"},{data:"hours"}],columnDefs:[{className:"control",searchable:!1,orderable:!1,responsivePriority:2,targets:0,render:function(e,t,a,s){return""}},{targets:1,responsivePriority:1,render:function(e,t,a,s){var n=a.project_name,i=a.framework,r=a.project_image;if(r)var l='<img src="'+assetsPath+"img/icons/brands/"+r+'" alt="Project Image" class="rounded-circle">';else{var o=["success","danger","warning","info","dark","primary","secondary"][Math.floor(6*Math.random())+1],d=(n=a.full_name).match(/\b\w/g)||[];l='<span class="avatar-initial rounded-circle bg-label-'+o+'">'+(d=((d.shift()||"")+(d.pop()||"")).toUpperCase())+"</span>"}return'<div class="d-flex justify-content-left align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3">'+l+'</div></div><div class="d-flex flex-column"><span class="text-truncate fw-medium">'+n+'</span><small class="text-muted">'+i+"</small></div></div>"}},{targets:2,orderable:!1},{targets:3,responsivePriority:3,render:function(e,t,a,s){var n,i=a.progress+"%";switch(!0){case a.progress<25:n="bg-danger";break;case a.progress<50:n="bg-warning";break;case a.progress<75:n="bg-info";break;case a.progress<=100:n="bg-success"}return'<div class="d-flex flex-column"><small class="mb-1">'+i+'</small><div class="progress w-100 me-3" style="height: 6px;"><div class="progress-bar '+n+'" style="width: '+i+'" aria-valuenow="'+i+'" aria-valuemin="0" aria-valuemax="100"></div></div></div>'}},{targets:4,orderable:!1}],order:[[1,"desc"]],dom:'<"d-flex justify-content-between align-items-center flex-column flex-sm-row mx-4 row"<"col-sm-4 col-12 d-flex align-items-center justify-content-sm-start justify-content-center"l><"col-sm-8 col-12 d-flex align-items-center justify-content-sm-end justify-content-center"f>>t<"d-flex justify-content-between mx-4 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',displayLength:7,lengthMenu:[7,10,25,50,75,100],language:{sLengthMenu:"Show _MENU_",searchPlaceholder:"Search Project"},responsive:{details:{display:$.fn.dataTable.Responsive.display.modal({header:function(e){return"Details of "+e.data().full_name}}),type:"column",renderer:function(e,t,a){var s=$.map(a,(function(e,t){return""!==e.title?'<tr data-dt-row="'+e.rowIndex+'" data-dt-column="'+e.columnIndex+'"><td>'+e.title+":</td> <td>"+e.data+"</td></tr>":""})).join("");return!!s&&$('<table class="table"/><tbody />').append(s)}}}});if(t.length)t.DataTable({ajax:assetsPath+"json/invoice-list.json",columns:[{data:""},{data:"invoice_id"},{data:"invoice_status"},{data:"total"},{data:"issued_date"},{data:"action"}],columnDefs:[{className:"control",responsivePriority:2,targets:0,render:function(e,t,a,s){return""}},{targets:1,render:function(e,t,a,s){var n=a.invoice_id;return'<a href="'+baseUrl+'app/invoice/preview"><span>#'+n+"</span></a>"}},{targets:2,render:function(e,t,a,s){var n=a.invoice_status,i=a.due_date;return"<span data-bs-toggle='tooltip' data-bs-html='true' title='<span>"+n+'<br> <span class="fw-medium">Balance:</span> '+a.balance+'<br> <span class="fw-medium">Due Date:</span> '+i+"</span>'>"+{Sent:'<span class="badge badge-center rounded-pill bg-label-secondary w-px-30 h-px-30"><i class="ti ti-circle-check ti-sm"></i></span>',Draft:'<span class="badge badge-center rounded-pill bg-label-primary w-px-30 h-px-30"><i class="ti ti-device-floppy ti-sm"></i></span>',"Past Due":'<span class="badge badge-center rounded-pill bg-label-danger w-px-30 h-px-30"><i class="ti ti-info-circle ti-sm"></i></span>',"Partial Payment":'<span class="badge badge-center rounded-pill bg-label-success w-px-30 h-px-30"><i class="ti ti-circle-half-2 ti-sm"></i></span>',Paid:'<span class="badge badge-center rounded-pill bg-label-warning w-px-30 h-px-30"><i class="ti ti-chart-pie ti-sm"></i></span>',Downloaded:'<span class="badge badge-center rounded-pill bg-label-info w-px-30 h-px-30"><i class="ti ti-arrow-down-circle ti-sm"></i></span>'}[n]+"</span>"}},{targets:3,render:function(e,t,a,s){return"$"+a.total}},{targets:-1,title:"Actions",orderable:!1,render:function(e,t,a,s){return'<div class="d-flex align-items-center"><a href="javascript:;" class="text-body" data-bs-toggle="tooltip" title="Send Mail"><i class="ti ti-mail me-2 ti-sm"></i></a><a href="'+baseUrl+'app/invoice/preview" class="text-body" data-bs-toggle="tooltip" title="Preview"><i class="ti ti-eye mx-2 ti-sm"></i></a><div class="d-inline-block"><a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow text-body" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></a><ul class="dropdown-menu dropdown-menu-end m-0"><li><a href="javascript:;" class="dropdown-item">Details</a></li><li><a href="javascript:;" class="dropdown-item">Archive</a></li><div class="dropdown-divider"></div><li><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></li></ul></div></div>'}}],order:[[1,"desc"]],dom:'<"row mx-4"<"col-sm-6 col-12 d-flex align-items-center justify-content-center justify-content-sm-start mb-3 mb-md-0"l><"col-sm-6 col-12 d-flex align-items-center justify-content-center justify-content-sm-end"B>>t<"row mx-4"<"col-md-12 col-lg-6 text-center text-lg-start pb-md-2 pb-lg-0"i><"col-md-12 col-lg-6 d-flex justify-content-center justify-content-lg-end"p>>',language:{sLengthMenu:"Show _MENU_",search:"",searchPlaceholder:"Search Invoice"},buttons:[{extend:"collection",className:"btn btn-label-secondary dropdown-toggle float-sm-end mb-3 mb-sm-0",text:'<i class="ti ti-screen-share ti-xs me-2"></i>Export',buttons:[{extend:"print",text:'<i class="ti ti-printer me-2" ></i>Print',className:"dropdown-item",exportOptions:{columns:[1,2,3,4]}},{extend:"csv",text:'<i class="ti ti-file-text me-2" ></i>Csv',className:"dropdown-item",exportOptions:{columns:[1,2,3,4]}},{extend:"excel",text:'<i class="ti ti-file-spreadsheet me-2"></i>Excel',className:"dropdown-item",exportOptions:{columns:[1,2,3,4]}},{extend:"pdf",text:'<i class="ti ti-file-description me-2"></i>Pdf',className:"dropdown-item",exportOptions:{columns:[1,2,3,4]}},{extend:"copy",text:'<i class="ti ti-copy me-2" ></i>Copy',className:"dropdown-item",exportOptions:{columns:[1,2,3,4]}}]}],responsive:{details:{display:$.fn.dataTable.Responsive.display.modal({header:function(e){return"Details of "+e.data().full_name}}),type:"column",renderer:function(e,t,a){var s=$.map(a,(function(e,t){return""!==e.title?'<tr data-dt-row="'+e.rowIndex+'" data-dt-column="'+e.columnIndex+'"><td>'+e.title+":</td> <td>"+e.data+"</td></tr>":""})).join("");return!!s&&$('<table class="table"/><tbody />').append(s)}}}});t.on("draw.dt",(function(){[].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map((function(e){return new bootstrap.Tooltip(e,{boundary:document.body})}))})),setTimeout((()=>{$(".dataTables_filter .form-control").removeClass("form-control-sm"),$(".dataTables_length .form-select").removeClass("form-select-sm")}),300)}));
