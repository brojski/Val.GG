function showVideo(videoId, description) {
  const videos = window.agentAbilityData.videos;
  const abilityNames = window.agentAbilityData.abilityNames;

  $("#video-placeholder").attr("src", videos[videoId]);
  $("#ability-name").text(abilityNames[videoId]);
  $("#ability-name").next().text(description);
}