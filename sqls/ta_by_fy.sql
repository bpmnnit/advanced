SELECT
(SELECT si_no FROM si WHERE si_id = target_achievement_si) AS SI,
(SELECT si_area FROM si WHERE si_id = target_achievement_si) AS Area,
(SELECT field_party_name FROM field_parties WHERE field_party_id = target_achievement_field_party) AS FP,
(SELECT region_name FROM regions WHERE region_id = target_achievement_region) AS Region,
target_achievement_re_target, target_achievement_be_target, target_achievement_achievement
FROM target_vs_achievement WHERE target_achievement_fy = '2019-20' AND target_achievement_acq_type LIKE '%3D%' 