using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using TMPro;
using UnityEngine.SceneManagement;

public class WristScript : MonoBehaviour
{

    public TMP_Text userName, timer;
    public float timeRemaining = 10;
    public GameObject timeUpPanel;

    // Start is called before the first frame update
    void Start()
    {
        timeUpPanel.SetActive(false);
        string username = PlayerPrefs.GetString("username");
        userName.text = username;
    }

    // Update is called once per frame
    void Update()
    {
        if (timeRemaining > 0)
        {
            timeRemaining -= Time.deltaTime;
            string _timeRemaining = timeRemaining.ToString("n2");
            timer.text = "Time: " + _timeRemaining;
        }
        else
        {
            timer.text = "Time: 0";
            timeUpPanel.SetActive(true);
        }
    }

    //Go to Main Menu
    public void goToMainMenu()
    {
        SceneManager.LoadScene("MainMenuScene");
    }
}
