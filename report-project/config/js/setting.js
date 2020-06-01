// DEFINE VARIABLES
// const XXX = "XXX";

// DEFINE GROUPS
var BASE_GROUPS = [];
BASE_GROUPS[_DEFAULT_GROUP] = {
	"isRedirect"   : false,
	"redirectPage" : null,
	"login"        : PROJECT_ROOT + "/login",
	"forgot"       : PROJECT_ROOT + "/forgot-password",
};

const URL_GROUPS = BASE_GROUPS;

var pagination_btn_prev = 'ก่อนหน้า';
var pagination_btn_next = 'ถัดไป';

var gb_variables = {
    'th': {
        'create_account': 'สร้างบัญชี',
        'verifying_data': 'กรุณารอสักครู่, ระบบกำลังตรวจสอบข้อมูล ...',
        'verify_success': 'ตรวจสอบข้อมูลเรียบร้อย',
    },
    'en' : {
        'create_account': 'Create an account',
        'verifying_data': 'Please wait, the system is verifying data ...',
        'verify_success': 'Verify the information successfully.',
    }
}

// Initail Secure
$.get(URL_API+"/site/csrf/token",function(e){$.ajaxSetup({headers:{"X-CSRF-TOKEN":e.csrf_token}})});
$.ajaxSetup({dataFilter:function(a){var c=")]}',\n";return 0===a.lastIndexOf(c,0)?JSON.parse(a.substr(c.length)):a}});