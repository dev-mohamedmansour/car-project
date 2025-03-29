let btnClick = document.querySelectorAll(".service-box");
let form = document.querySelector(".Form");
let serviceInput = document.querySelector(".service");

for (let i = 0; i < btnClick.length; i++) {
    btnClick[i].addEventListener("click", function (e) {
        e.preventDefault(); // Prevent default anchor behavior

        // Show the form
        form.style.display = "block";

        // Extract service name from the HTML content
        let serviceText = btnClick[i].textContent.trim();
        // Remove emoji and extra whitespace
        serviceText = serviceText.replace(/[^\w\s]/g, '').replace(/\s+/g, ' ').trim();

        // Set the service input value
        serviceInput.value = serviceText;

        // Scroll to form if needed
        document.querySelector("#form").scrollIntoView({behavior: 'smooth'});
    });
}

/*dashboard */

// التبديل بين الفتح والإغلاق عند الضغط على أيقونة القائمة الجانبية
const body = document.querySelector("body"),
    sidebar = body.querySelector("nav"),
    toggle = body.querySelector(".toggle"),
    modeSwitch = body.querySelector(".toggle-switch"),
    modeText = body.querySelector(".mode-text"),
    mobileToggle = body.querySelector(".mobile-toggle"),
    sidebarOverlay = document.createElement("div"); // إنشاء عنصر الخلفية الداكنة

// إضافة الخلفية الداكنة إلى الـ body
sidebarOverlay.classList.add("sidebar-overlay");
body.appendChild(sidebarOverlay);

// التبديل بين الفتح والإغلاق عند الضغط على أيقونة القائمة الجانبية
if (toggle) {
    toggle.addEventListener("click", () => {
        if (window.innerWidth <= 767) {
            sidebar.classList.toggle("show"); // استخدام كلاس خاص للشاشات الصغيرة
            sidebarOverlay.style.display = sidebar.classList.contains("show") ? "block" : "none";
        } else {
            sidebar.classList.toggle("close");
        }
    });
}

// التأكد من أن mobileToggle موجود قبل استخدامه
if (mobileToggle) {
    mobileToggle.addEventListener("click", () => {
        sidebar.classList.add("show");
        sidebarOverlay.style.display = "block";
    });
}

// عند الضغط خارج القائمة أو على الـ Overlay، يتم إغلاقها
sidebarOverlay.addEventListener("click", () => {
    sidebar.classList.remove("show");
    sidebarOverlay.style.display = "none";
});

// تبديل الوضع الداكن
if (modeSwitch) {
    modeSwitch.addEventListener("click", () => {
        body.classList.toggle("dark");
        modeText.innerText = body.classList.contains("dark") ? "Light mode" : "Dark mode";
    });
}