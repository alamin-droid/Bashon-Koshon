<?php
Route::get('/', function () {return view('welcome');})->name('welcome');

Auth::routes();
Route::group(['middleware' => ['preventbackbutton','auth']],function() {
Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('/user', 'Admin\UserController');
    Route::get('user-index', 'Admin\UserController@index')->name('user.index');
    Route::get('user-create', 'Admin\UserController@create')->name('user.create');

    Route::resource('/owner', 'Admin\OwnerController');
    Route::get('owner-index', 'Admin\OwnerController@index')->name('owner.index');
    Route::get('owner-create', 'Admin\OwnerController@create')->name('owner.create');

    Route::resource('factory', 'Admin\FactoryController');
    Route::get('factory-index', 'Admin\FactoryController@index')->name('factory.index');
    Route::get('factory-create', 'Admin\FactoryController@create')->name('factory.create');
    Route::get('factory-production-request-{id}', 'Admin\FactoryController@production_request')->name('factory.production_request');
    Route::get('factory-details-{id}', 'Admin\FactoryController@factory_details')->name('factory.factory_details');

    Route::resource('warehouse', 'Admin\WarehouseController');
    Route::get('warehouse-index', 'Admin\WarehouseController@index')->name('warehouse.index');
    Route::get('warehouse-create', 'Admin\WarehouseController@create')->name('warehouse.create');
    Route::get('warehouse-details-{id}', 'Admin\WarehouseController@warehouse_details')->name('warehouse.warehouse_details');

    Route::resource('/rawmaterials','Admin\RawmaterialsController');
    Route::get('rawmaterials-index','Admin\RawmaterialsController@index')->name('rawmaterials.index');
    Route::get('rawmaterials-create','Admin\RawmaterialsController@create')->name('rawmaterials.create');

    Route::resource('/finishedgood','Admin\FinishedgoodController');
    Route::get('finishedgood-index','Admin\FinishedgoodController@index')->name('finishedgood.index');
    Route::get('finishedgood-create','Admin\FinishedgoodController@create')->name('finishedgood.create');

    Route::resource('/supplier','Admin\SupplierController');
    Route::get('supplier-index','Admin\SupplierController@index')->name('supplier.index');
    Route::get('supplier-create','Admin\SupplierController@create')->name('supplier.create');
    Route::get('supplier-show-{id}','Admin\SupplierController@show')->name('supplier.show');
    Route::get('supplier-search','Admin\SupplierController@search')->name('supplier.search');

    Route::resource('/employee','Admin\EmployeeController');
    Route::get('employee-index','Admin\EmployeeController@index')->name('employee.index');
    Route::get('employee-create','Admin\EmployeeController@create')->name('employee.create');
    Route::get('employee-show-{id}','Admin\EmployeeController@show')->name('employee.show');
    Route::get('employee-search','Admin\EmployeeController@search')->name('employee.search');

    Route::resource('/client','Admin\ClientController');
    Route::get('client-index','Admin\ClientController@index')->name('client.index');
    Route::get('client-create','Admin\ClientController@create')->name('client.create');
    Route::get('client-show-{id}','Admin\ClientController@show')->name('client.show');
    Route::get('client-search','Admin\ClientController@search')->name('client.search');

    Route::resource('/purchase','Admin\PurchaseController');
    Route::get('purchase-index','Admin\PurchaseController@index')->name('purchase.index');
    Route::get('purchase-create','Admin\PurchaseController@create')->name('purchase.create');

    Route::resource('/production','Admin\ProductionController');
    Route::get('production-index','Admin\ProductionController@index')->name('production.index');
    Route::get('production-create','Admin\ProductionController@create')->name('production.create');

    Route::resource('/sell','Admin\SellController');
    Route::get('sell-index','Admin\SellController@index')->name('sell.index');
    Route::get('sell-create','Admin\SellController@create')->name('sell.create');
    Route::get('sell-invoice-{id}','Admin\SellController@show')->name('sell.show');
    Route::get('sell-challan-{id}','Admin\SellController@challan')->name('sell.challan');

    Route::get('request-approval-purchase', 'Admin\RequestapprovalController@purchase')->name('request_approval.purchase');
    Route::get('request-approval-purchase-approve-{id}', 'Admin\RequestapprovalController@purchase_approve')->name('request_approval.purchase_approve');
    Route::get('request-approval-purchase-gatepass-{id}', 'Admin\RequestapprovalController@purchase_gatepass')->name('request_approval.purchase_gatepass');

    Route::get('request-approval-sales', 'Admin\RequestapprovalController@sales')->name('request_approval.sales');
    Route::get('request-approval-sales-approve-{id}', 'Admin\RequestapprovalController@sales_approve')->name('request_approval.sales_approve');
    Route::get('request-approval-sales-gatepass-{id}', 'Admin\RequestapprovalController@sales_gatepass')->name('request_approval.sales_gatepass');

    Route::get('request-approval-production', 'Admin\RequestapprovalController@production')->name('request_approval.production');
    Route::get('request-approval-production-approve-{id}', 'Admin\RequestapprovalController@production_approve')->name('request_approval.production_approve');
    Route::get('request-approval-production-gatepass-{id}', 'Admin\RequestapprovalController@production_gatepass')->name('request_approval.production_gatepass');


    Route::resource('/delivery', 'Admin\DeliveryController');
    Route::get('delivery-index', 'Admin\DeliveryController@index')->name('delivery.index');
    Route::get('delivery-create-{id}', 'Admin\DeliveryController@create')->name('delivery.create');

    Route::get('inventory-raw-materials', 'Admin\InventoryController@rawmaterial')->name('inventory.rawmaterial');
    Route::get('inventory-raw-materials-date-search', 'Admin\InventoryController@rawmaterial_date_search')->name('inventory.date_search_raw_materials');
    Route::get('inventory-production', 'Admin\InventoryController@production')->name('inventory.production');
    Route::get('inventory-production-date-search', 'Admin\InventoryController@production_date_search')->name('inventory.date_search_production');

    Route::resource('payroll', 'Admin\PayrollController');
    Route::get('payroll-create', 'Admin\PayrollController@create')->name('payroll.create');
    Route::get('payroll-info', 'Admin\PayrollController@index')->name('payroll.index');
    Route::get('payroll-payslip-{id}', 'Admin\PayrollController@payslip')->name('payroll.payslip');
    Route::get('payroll-date-search', 'Admin\PayrollController@date_search')->name('payroll.date_search');
    Route::get('employee_id/{employee_id}', 'Admin\PayrollController@employee');
    Route::get('overtime/{month}', 'Admin\PayrollController@overtime');

    Route::resource('/advance', 'Admin\AdvanceController');
    Route::get('advance-index', 'Admin\AdvanceController@index')->name('advance.index');
    Route::get('advance-create', 'Admin\AdvanceController@create')->name('advance.create');
    Route::get('advance-date-search', 'Admin\AdvanceController@date_search')->name('advance.date_search');

    Route::resource('attendance', 'Admin\AttendanceController');
    Route::get('attendance-create', 'Admin\AttendanceController@create')->name('attendance.attendance_create');
    Route::get('attendance-index', 'Admin\AttendanceController@index')->name('attendance.attendance_info');
    Route::get('attendance-show-{id}', 'Admin\AttendanceController@show')->name('attendance.show');
    Route::get('attendance-date_search', 'Admin\AttendanceController@date_search')->name('attendance.date_search');
    Route::post('/attendance/month/','Admin\AttendanceController@attendance_Month')->name('attendance_month');

    Route::resource('/bank', 'Admin\BankController');
    Route::get('bank-index', 'Admin\BankController@index')->name('bank.index');
    Route::get('bank-create', 'Admin\BankController@create')->name('bank.create');
    Route::get('bank-show-{id}', 'Admin\BankController@show')->name('bank.show');
    Route::get('bank-balance-search', 'Admin\BankController@date_search')->name('bank.balance_search');

    Route::resource('/cheque', 'Admin\ChequeController');
    Route::get('cheque-index', 'Admin\ChequeController@index')->name('cheque.index');
    Route::get('cheque-create', 'Admin\ChequeController@create')->name('cheque.create');
    Route::get('cheque-show-{id}', 'Admin\ChequeController@show')->name('cheque.show');

    Route::resource('/payment', 'Admin\PaymentController');
    Route::get('payment-index', 'Admin\PaymentController@index')->name('payment.index');
    Route::get('payment-create', 'Admin\PaymentController@create')->name('payment.create');
    Route::get('payment-search_date', 'Admin\PaymentController@search_date')->name('payment.search_date');

    Route::resource('/collection', 'Admin\CollectionController');
    Route::get('collection-index', 'Admin\CollectionController@index')->name('collection.index');
    Route::get('collection-create', 'Admin\CollectionController@create')->name('collection.create');
    Route::get('collection-search_date', 'Admin\CollectionController@search_date')->name('collection.search_date');

    Route::resource('/administrative', 'Admin\AdministrativeController');
    Route::get('administrative-index', 'Admin\AdministrativeController@index')->name('administrative.index');
    Route::get('administrative-create', 'Admin\AdministrativeController@create')->name('administrative.create');
    Route::get('administrative-search_date', 'Admin\AdministrativeController@search_date')->name('administrative.search_date');

    Route::get('/supplier_due/{supplier_id}', 'Admin\PaymentController@supplier_due');
    Route::get('/client_id/{cid}', 'Admin\CollectionController@client_due');

    Route::get('report-balance', 'Admin\ReportController@balance')->name('report.balance');
    Route::get('report-balance-date_search', 'Admin\ReportController@balance_date')->name('report.date_search_balance_sheet');
});
