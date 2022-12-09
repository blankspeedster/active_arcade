using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using TMPro;
using UnityEngine.SceneManagement;

public class MainMenuSceneController : MonoBehaviour
{
    public TMP_Text userName;
    public TMP_InputField timer;
    // Start is called before the first frame update
    void Start()
    {
        string username = PlayerPrefs.GetString("username");
        userName.text = username;
    }

    // Update is called once per frame
    void Update()
    {
        
    }

    // go to Wrist Scene
    public void goToWrist()
    {
        SceneManager.LoadScene("Wrist");
    }

    // go to Elbow
    public void goToElbow()
    {
        SceneManager.LoadScene("Elbow");
    }
    
    // go to Elbow
    public void gotoShoulder()
    {
        SceneManager.LoadScene("Shoulder");
    }

    public void SetGlobalTimer()
    {
        string _Stime = timer.text.ToString();
        int _time;    
        int.TryParse(_Stime, out _time);
        PlayerPrefs.SetInt("globalTimer", _time);
    }

}
