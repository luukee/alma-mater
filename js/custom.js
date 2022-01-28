// const sportsNav = document.querySelector(".sports");
// const sportsIcon = document.createElement("i");
// sportsIcon.setAttribute("class", "vc_icon_element-icon fas fa-running");
// sportsNav.appendChild(sportsIcon);

const schoolGrid = document.querySelector(".post-grid__schools");

if (schoolGrid) {
	// vc custom grid: schools list move link
	const postGrid = document.getElementById("post-grid__schools");
	const postGridItems = postGrid.querySelectorAll(
		"div.post-grid-item__schools"
	);

	function moveURL(link) {
		const metaLink = link.querySelector(
			".vc_gitem-post-meta-field-school_link"
		).innerHTML;
		const postLink = link.querySelector(".vc-zone-link");
		postLink.href = metaLink;

		postLink.setAttribute("target", "_blank");
	}
	postGridItems.forEach(moveURL);
}
