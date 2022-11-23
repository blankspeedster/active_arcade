using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using TMPro;
using UnityEngine.SceneManagement;

public class WelcomeScreen : MonoBehaviour
{
    public TMP_Text userName;
    public Button proceedBtn;
    // Start is called before the first frame update
    void Start()
    {
        
    }

    // Update is called once per frame
    void Update()
    {
        if(userName.text.Length <= 1)
        {
            proceedBtn.interactable = false;
        }
        else
        {
            proceedBtn.interactable = true;
        }
    }

    //Go to Selection Scene
    public void goToMainMenu()
    {
        string _userName = userName.text;
        PlayerPrefs.SetString("username", _userName);
        SceneManager.LoadScene("MainMenuScene");
    }
}
