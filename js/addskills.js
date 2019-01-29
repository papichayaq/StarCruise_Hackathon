/*$(function () {
    $(wrapper).on("click", ".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove();
    })
});*/

function add_skill() {
        var skill_group = document.createElement('div');
        skill_group.className = 'row';
        var skill_entry = document.createElement('div');
        skill_entry.className = 'col-sm-6 form-group';
        var text = '<label>Skill Requirements</label>\
        <input type="text" placeholder="Select Skill.." class="form-control" name="skill[]">'
        var skill_entry2 = document.createElement('div');
        skill_entry2.className = 'col-sm-6 form-group';
        var text2 = '<label>Minimum Experience</label>\
        <input type="number" placeholder="Number in Years.." class="form-control" name="minexp[]">'/*\
        /<a href="#" class="remove_field">Remove</a>'*/;
        skill_entry.innerHTML = text;
        skill_entry2.innerHTML = text2;
        skill_group.appendChild(skill_entry);
        skill_group.appendChild(skill_entry2);
        document.getElementById("skills").appendChild(skill_group);
}