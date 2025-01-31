function showTab(tabId) {
  // Hide all tab content
  const tabContents = document.querySelectorAll(".tab-content");
  tabContents.forEach((content) => {
    content.classList.add("hidden");
  });

  // Show the selected tab content
  const selectedTab = document.getElementById(tabId);
  if (selectedTab) {
    selectedTab.classList.remove("hidden");
  }

  // Remove the 'active' class from all tab buttons
  const tabButtons = document.querySelectorAll(".tab-button");
  tabButtons.forEach((button) => {
    button.classList.remove("active");
  });

  // Add the 'active' class to the clicked tab button
  const clickedButton = document.querySelector(
    `[onclick="showTab('${tabId}')"]`
  );
  if (clickedButton) {
    clickedButton.classList.add("active");
  }
}

// Initialize the first tab
showTab("tab5");
