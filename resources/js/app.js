require('./bootstrap')
window.setFilterType = () => {
    document.getElementById("filterValue").disabled = false
}
window.setFilter = (filterValue) => {
    const value = filterValue.value
    document.getElementById(
        document.getElementById("filterType").value
    ).value = value
}
