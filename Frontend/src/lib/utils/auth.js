export function requireAdmin() {
    if (typeof localStorage === "undefined" || localStorage.getItem("loggedIn") !== "true") {
        window.location.href = "/login";
        return false;
    }
    return true;
}

//if not logged, no access to admin pages (edit/ delete function)